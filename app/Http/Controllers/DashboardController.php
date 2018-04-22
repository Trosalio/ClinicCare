<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // grant access to user with role 'client' to access
        // client/dashboard.blade.php
        $redirectedLink = route('client.dashboard');
        if ($request->user()->role === 'admin') {
            // grant access to user with role 'admin' to access
            // admin/dashboard.blade.php
            $redirectedLink = route('admin.dashboard');
        } else if ($request->user()->role === 'doctor') {
            // grant access to user with role 'doctor' to access
            // doctor/dashboard.blade.php
            $redirectedLink = route('doctor.dashboard');
        }
        return view('dashboard', ['redirect' => $redirectedLink]);
    }
}
