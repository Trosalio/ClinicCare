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
        $status = null;
        if (session('success')) {
            $status = session('success');
        }
        return view('layouts.profile.show')->with('status', $status);
    }

    public function edit()
    {
        return view('layouts.profile.edit');
    }

    public function update(Request $request)
    {
        if (Auth::user()->role === 'doctor') {
            $request->validate([
                'work_day' => 'required|boolean',
                'weekday' => 'required_if:work_day,1',
                'start_hour' => 'required|numeric|between:9,16',
                'end_hour' => 'required|numeric|between:10,17',
                'medical_license_no' => ['required', 'string', 'size:10', Rule::unique
                ('doctors')->ignore(Auth::user()->doctor->id)]
            ]);
        }
        $request->validate([
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'id_no' => ['required', 'numeric', 'digits:13', Rule::unique
            ('clients')->ignore(Auth::user()->client->id)],
            'tel_no' => ['required', 'numeric', 'digits:10', Rule::unique
            ('clients')->ignore(Auth::user()->client->id)],
            'gender' => ['required', Rule::in(['m', 'f'])],
            'weight' => 'required|numeric|between:1,500',
            'height' => 'required|numeric|between:20,300',
            'blood_type' => ['required', Rule::in(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'])],
            'intolerances' => 'nullable|string',
            'health_conditions' => 'nullable|string',
        ]);
        if (Auth::user()->role === 'doctor') {
            Auth::user()->doctor->medical_license_no = $request->input('medical_license_no');
            Auth::user()->doctor->work_day = $request->input('work_day');
            if ($request->input('work_day')) {
                Auth::user()->doctor->weekday = json_encode($request->input('weekday'));
            } else {
                Auth::user()->doctor->weekday = null;
            }
            Auth::user()->doctor->start_hour = $request->input('start_hour');
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
        return redirect()->route('profile')->with('success', "User: " . Auth::user()->username . "'s profile has been updated!");
    }

    public function showDiagnosis()
    {   
        $diagnoses = \App\Diagnosis::where('client_id', Auth::user()->client->id)->get();
        return view('client/medicalDiag', ['diagnoses' => $diagnoses]);
        // return $diagnoses;
        // $appointments = App\Appointment::where('client_id', Auth::user()->client->id)->get();
        // print_r($appointments);
        // $diagnoses = Diagnosis::all();
        // foreach ($diagnoses as $diag) {
            // diag
        // }
        // return view('client/medicalDiag', ['diagnoses' => $diagnoses]);
    }
}
