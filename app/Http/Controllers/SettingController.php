<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use File;

class SettingController extends Controller
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
        $setting = Setting::All()->first();
        return view('backend.settings.index', compact('setting'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'site_title'           => 'required',
            'site_author'          => 'required',
            'site_url'             => 'required|url',
            'site_type'            => '',
            'site_robots'          => '',
            'site_app_id'          => '',
            'site_creator'         => '',
            'site_card'            => '',
            'site_keywords'        => 'required',
            'site_description'     => 'required',
            'site_image'           => 'required|file|image|max:1024',
            'site_image_width'     => 'required|numeric',
            'site_image_height'    => 'required|numeric'
        ],
        [
            'site_url.url' => 'Enter valid URL. With http://www. or https://www'
        ]);

        if($request->has('site_image')){
            $validatedData['site_image'] =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('site_image')->extension();

            // create an image manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $image = $manager->make($request->site_image)->resize($validatedData['site_image_width'], $validatedData['site_image_height']);
        }

        if(Setting::create($validatedData)){
            $path = public_path('storage/uploads/seo');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $image->save(public_path('storage/uploads/seo/'.$validatedData['site_image']));

            return redirect()->route('settings')->with('successMessage', 'Settings successfully updated!');
        }
        return redirect()->route('settings')->with('errorMessage', 'An error has occurred please try again later!');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'site_title'           => 'required',
            'site_author'          => 'required',
            'site_url'             => 'required|url',
            'site_type'            => '',
            'site_robots'          => '',
            'site_app_id'          => '',
            'site_creator'         => '',
            'site_card'            => '',
            'site_keywords'        => 'required',
            'site_description'     => 'required'
        ],
        [
            'site_url.url' => 'Enter valid URL. With http://www. or https://www'
        ]);

        if(Setting::all()->first()->update($validatedData)){
           return redirect()->route('settings')->with('successMessage', 'Settings successfully updated!');
        }
        return redirect()->route('settings')->with('errorMessage', 'An error has occurred please try again later!');
    }

    public function settingsImageUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'site_image_width'          => 'required|numeric',
            'site_image_height'         => 'required|numeric',
            'site_image'                => 'required|file|image|max:1024'
        ]);

        $oldImage = Setting::All()->first()->site_image;

        if($request->has('site_image')){
            $validatedData['site_image'] =  str_shuffle(Str::random(6)).str_shuffle(Str::random(6)).'-'.date('dmy').'.'.$request->file('site_image')->extension();

            // create an image manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'gd'));
            $image = $manager->make($request->site_image)->resize($validatedData['site_image_width'], $validatedData['site_image_height']);
        }

        if(Setting::All()->first()->update($validatedData)){
            $path = public_path('storage/uploads/seo/');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            if($image->save(public_path('storage/uploads/seo/'.$validatedData['site_image']))){
                if (is_file(public_path('storage/uploads/seo/'.$oldImage))) {
                    unlink(public_path('storage/uploads/seo/'.$oldImage));
                }
            }

            return redirect()->route('settings')->with('successMessage', 'SEO image successfully updated!');
        }
        return redirect()->route('settings')->with('errorMessage', 'An error has occurred please try again later!');
    }
}
