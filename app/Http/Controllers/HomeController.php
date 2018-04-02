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
        $this->middleware('auth', ['except' => ['app']]);
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

    /**
     * Show the page that can only access by admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminAccess(Request $request)
    {
        // request only grant user with role 'admin' to access
        // admin/dashboard.blade.php
        $request->user()->authorizeRoles('admin');
        return view('admin.dashboard');
    }

    public function app()
    {
        return view('layouts.app');
    }
}
