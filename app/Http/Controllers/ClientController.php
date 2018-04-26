<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.dashboard');
    }

    public function profile()
    {
        return view('layouts.profile.show');
    }

    public function edit()
    {
        return view('layouts.profile.edit');
    }

    public function update(Request $request)
    {
        if (Auth::user()->role === 'doctor') {
            $request->validate([
                'medical_license_no' => 'nullable|string|size:10|unique:doctors,medical_license_no'
            ]);
        }
        $request->validate([
            'firstname' => 'nullable|alpha',
            'lastname' => 'nullable|alpha',
            'id_no' => 'nullable|numeric|digits:13|unique:clients,id_no',
            'tel_no' => 'nullable|numeric|digits:10|unique:clients,tel_no',
            'gender' => ['required', Rule::in(['m', 'f'])],
            'weight' => 'nullable|numeric|digits:3',
            'height' => 'nullable|numeric|digits:3',
            'blood_type' => ['required', Rule::in(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'])],
            'intolerances' => 'nullable|string',
            'health_conditions' => 'nullable|string',
        ]);
        if (Auth::user()->role === 'doctor') {
            Auth::user()->doctor->medical_license_no = $request->input('medical_license_no');
            Auth::user()->doctor->save();
        }
        Auth::user()->client->firstname = $request->input('firstname');
        Auth::user()->client->lastname = $request->input('lastname');
        Auth::user()->client->id_no = $request->input('id_no');
        Auth::user()->client->tel_no = $request->input('tel_no');
        Auth::user()->client->gender = $request->input('gender');
        Auth::user()->client->weight = $request->input('weight');
        Auth::user()->client->height = $request->input('height');
        Auth::user()->client->blood_type = $request->input('blood_type');
        Auth::user()->client->intolerances = $request->input('intolerances');
        Auth::user()->client->health_conditions = $request->input('health_conditions');
        Auth::user()->client->save();
        return redirect()->route('profile');
    }
}
