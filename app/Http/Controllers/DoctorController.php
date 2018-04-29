<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('doctor.dashboard');
    }

    public function profile()
    {
        return view('profile');
    }

    public function showDiagnosis()
    {
        $id = \App\Models\Doctor::where('user_id',auth()->user()->id)->first()->id;
        $diagnoses = \App\Diagnosis::where('doctor_id',$id)->get();
        return view('doctor/diagnosis/show',['diagnoses'=>$diagnoses]);
        // return view('doctor/diagnosis/show');
    }

    public function showAllPatient()
    {
        $id = \App\Models\Doctor::where('user_id',auth()->user()->id)->first()->id; //id doctor
        $patient = \App\Diagnosis::where('doctor_id',$id)->get();
        return view('doctor/patient',['diagnoses'=>$patient]);
    }
}
