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

    /**
     * Show the page that can only access by admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminDashboard(Request $request)
    {
        // request only grant user with role 'admin' to access
        // admin/dashboard.blade.php
        if($request->user()->authorizeRoles('admin')){
            return view('admin.dashboard');
        }
        return redirect()->route('welcomePage');
    }

    public function clientDashboard(Request $request)
    {
        // request only grant user with role 'client' to access
        // client/dashboard.blade.php
        if($request->user()->authorizeRoles('client')){
            return view('client.dashboard');
        }
        return redirect()->route('welcomePage');
    }

    public function doctorDashboard(Request $request)
    {
        // request only grant user with role 'doctor' to access
        // doctor/dashboard.blade.php
        if($request->user()->authorizeRoles('doctor')){
            return view('doctor.dashboard');
        }
        return redirect()->route('welcomePage');
    }
}
