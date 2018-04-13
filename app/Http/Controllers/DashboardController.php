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
        if ($request->user()->authorizeRoles('admin')) {
            // grant access to user with role 'admin' to access
            // admin/dashboard.blade.php
            $redirectedLink = route('admin.dashboard');
        } else if ($request->user()->authorizeRoles('doctor')) {
            // grant access to user with role 'doctor' to access
            // doctor/dashboard.blade.php
            $redirectedLink = route('doctor.dashboard');
        }
        return view('dashboard', ['redirect' => $redirectedLink]);
    }


    /**
     * Show the page that can only access by admin.
     *
     * @param Request $request
     * @param String $includedContent
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function adminDashboard(Request $request, String $includedContent
    = 'reports')
    {
        // request only grant user with role 'admin' to access
        // admin/dashboard.blade.php
        if ($request->user()->authorizeRoles('admin')) {
            $users = \App\User::paginate(10);
            return view('admin.dashboard')
                ->with(['includedContent' => $includedContent, 'users' => $users]);
        }
        return redirect()->route('welcomePage');
    }

    public function clientDashboard(Request $request)
    {
        // request only grant user with role 'client' to access
        // client/dashboard.blade.php
        if ($request->user()->authorizeRoles('client')) {
            return view('client.dashboard');
        }
        return redirect()->route('welcomePage');
    }

    public function doctorDashboard(Request $request)
    {
        // request only grant user with role 'doctor' to access
        // doctor/dashboard.blade.php
        if ($request->user()->authorizeRoles('doctor')) {
            return view('doctor.dashboard');
        }
        return redirect()->route('welcomePage');
    }
}
