<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Set how many failed logins are allowed before being locked out.
     */
    protected $maxAttempts = 5;

    /**
     * Set how many seconds a lockout will last.
     */
    protected $decayMinutes = 30;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->active_status === '0') {
            Auth::logout();
            return back()->with('LoginStatusError', 'Dear '.$user->name.', Your account has been disabled. Please contact with site authority for more informations.');
        }

        if ($user->active_status === '2') {
            Auth::logout();
            return back()->with('LoginStatusError', 'Dear '.$user->name.', You are not authorized to access the system beacuse of your resignation from our company.');
        }
    }

    public function username()
    {
        return 'username';
    }
}
