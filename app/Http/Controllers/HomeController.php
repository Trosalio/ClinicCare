<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function adminAccess(Request $request)
    {
        // request only grant user with role 'admin' to access
        // admin/dashboard.blade.php
        $request->user()->authorizeRoles('admin');
        return view('admin.dashboard');
    }
}
