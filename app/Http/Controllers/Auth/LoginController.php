<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
            ? $this->username()
            : 'username';

        return [
            $field => $request->get($this->username()),
            'password' => $request->password,
        ];
    }

    /**
     * Where to redirect users after login.
     */
    public function authenticated()
    {

        if (Auth::user()->isAdmin()) {
            // grant access to user with role 'admin' to access
            // admin/dashboard.blade.php
            return redirect()->route('users.index');
        } else if (Auth::user()->role === 'doctor') {
            // grant access to user with role 'doctor' to access
            // doctor/dashboard.blade.php
            return redirect()->route('doctor.dashboard');
        }
        // grant access to user with role 'client' to access
        // dashboard.blade.php
        return redirect()->route('dashboard');
    }
}
