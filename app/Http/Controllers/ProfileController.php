<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use File;
use Purifier;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::with('profile')->find(Auth::id());
        return view('backend.profiles.index', compact('user'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'user_id'              => 'required',
            'phone'                => 'required|numeric|digits:11',
            'email'                => 'required|email',
            'dob'                  => 'required|date|min:3|max:100',
            'gender'               => 'required',
            'nid'                  => 'required|numeric',
            'designation'          => 'required',
            'country'              => 'required',
            'address'              => 'required',
            'city'                 => 'required',
            'area'                 => 'required',
            'postal_code'          => 'required|numeric',
            'bio'                  => 'required',
            'facebook'             => 'required|url',
            'twitter'              => 'required|url',
            'skype'                => 'required',
            'linkedin'             => 'required|url',
            'image'                => 'required|file|image|max:1024'
        ],
        [
            'facebook.url' => 'Enter valid URL. With http://www. or https://www.',
            'twitter.url'  => 'Enter valid URL. With http://www. or https://www.',
            'linkedin.url' => 'Enter valid URL. With http://www. or https://www.'
        ]);
        if($request->user_id != Auth::user()->id){
            return redirect()->route('profile')->with('errorMessage', 'An error has occurred please try again later!');
        }

        if($request->has('image')){
            $validatedData['image'] =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

            // create an image manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $image = $manager->make($request->image)->resize(300, 300);
        }

        //Cleaning data here

        $validatedData['bio'] = Purifier::clean($validatedData['bio']);

        if(Profile::create($validatedData)){
            $path = public_path('storage/uploads/profile/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $image->save(public_path('storage/uploads/profile/'.$validatedData['image']));

            return redirect()->route('profile')->with('successMessage', 'Profile successfully updated!');
        }
        return redirect()->route('profile')->with('errorMessage', 'An error has occurred please try again later!');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'phone'                => 'required|numeric|digits:11',
            'email'                => 'required|email',
            'dob'                  => 'required|date|min:3|max:100',
            'gender'               => 'required',
            'nid'                  => 'required|numeric',
            'designation'          => 'required',
            'country'              => 'required',
            'address'              => 'required',
            'city'                 => 'required',
            'area'                 => 'required',
            'postal_code'          => 'required|numeric',
            'bio'                  => 'required'
        ]);

        $validatedData['bio'] = Purifier::clean($validatedData['bio']);


        if(Profile::where('user_id', Auth::user()->id)->update($validatedData)){
            return redirect()->route('profile')->with('successMessage', 'Profile successfully updated!');
        }
        return redirect()->route('profile')->with('errorMessage', 'An error has occurred please try again later!');
    }

    public function profleImageUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'image'                => 'required|file|image|max:1024'
        ]);

        $oldImage = Auth::user()->profile->image;

        if($request->has('image')){
            $validatedData['image'] =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('image')->extension();

            // create an image manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $image = $manager->make($request->image)->resize(300, 300);
        }

        if(Profile::where('user_id', Auth::user()->id)->update($validatedData)){
            $path = public_path('storage/uploads/profile/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            if($image->save(public_path('storage/uploads/profile/'.$validatedData['image']))){
                if (is_file(public_path('storage/uploads/profile/'.$oldImage))) {
                    unlink(public_path('storage/uploads/profile/'.$oldImage));
                }
            }

            return redirect()->route('profile')->with('successMessage', 'Profile image successfully updated!');
        }
        return redirect()->route('profile')->with('errorMessage', 'An error has occurred please try again later!');
    }

    public function profleSocialUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'facebook'             => 'required|url',
            'twitter'              => 'required|url',
            'skype'                => 'required',
            'linkedin'             => 'required|url'
        ],
        [
            'facebook.url' => 'Enter valid URL. With http://www. or https://www.',
            'twitter.url'  => 'Enter valid URL. With http://www. or https://www.',
            'linkedin.url' => 'Enter valid URL. With http://www. or https://www.'
        ]);

        if(Profile::where('user_id', Auth::user()->id)->update($validatedData)){
            return redirect()->route('profile')->with('successMessage', 'Social links successfully updated!');
        }
        return redirect()->route('profile')->with('errorMessage', 'An error has occurred please try again later!');
    }

    public function password()
    {
        return view('backend.settings.password');
    }

    public function passwordUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password'],
        ]);

        if(User::find(auth()->user()->id)->update(['password'=> Hash::make($validatedData['new_password'])])){
            return redirect()->route('password')->with('successMessage', 'Password changed successfully!');
        }
        return redirect()->route('password')->with('errorMessage', 'An error has occurred please try again later!');
    }
}
