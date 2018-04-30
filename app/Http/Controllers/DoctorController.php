<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Diagnosis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::where('doctor_id', Auth::user()->doctor->id)->get();
        return view('doctor.dashboard',['appointments'=>$appointments]);
    }

    public function profile()
    {
        return view('profile');
    }

    public function showDiagnosis()
    {
        $diagnoses = Diagnosis::where('doctor_id', Auth::user()->doctor->id)->get();
        return view('doctor/diagnosis/show', ['diagnoses' => $diagnoses]);
        // return view('doctor/diagnosis/show');
    }

    public function showAllPatient()
    {
        $diagnoses = Diagnosis::where('doctor_id', Auth::user()->doctor->id)->get();
        $clients = array();
        foreach ($diagnoses as $diag) {
            array_push($clients, $diag->appointment->client);
        }
        // print_r($clients) ;
        return view('doctor/patient', ['clients' => $clients]);
    }

    public function createDiagnosis(Appointment $appointment)
    {
        return view('doctor/diagnosis/create')
            ->with('appointment', $appointment);
    }

    public function storeDiagnosis(Request $request)
    {
        return $request;
    }

    public function editDiagnosis(Diagnosis $diagnose)
    {
        return view('doctor/diagnosis/edit')
            ->with('diagnose', $diagnose);
    }
}
