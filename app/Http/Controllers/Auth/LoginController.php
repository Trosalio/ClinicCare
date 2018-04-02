<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
     * Where to redirect users after login.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *  redirect to a proper route
     */
    public function authenticated(Request $request)
    {
        if ($request->user()->authorizeRoles('admin')) {
            // request only grant user with role 'admin' to access
            // admin/dashboard.blade.php
            return redirect()->route('admin.dashboard');
        } else if ($request->user()->authorizeRoles('doctor')) {
            // request only grant user with role 'doctor' to access
            // doctor/dashboard.blade.php
            return redirect()->route('doctor.dashboard');
        }
        // request only grant user with role 'client' to access
        // client/dashboard.blade.php
        return redirect()->route('client.dashboard');
    }
}
