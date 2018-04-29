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
        $id = \App\Models\Doctor::where('user_id',auth()->user()->id)->first()->id;
        $appointments = \App\Appointment::where('doctor_id', $id)->get();
        return view('doctor.dashboard',['appointments'=>$appointments]);
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
        $diagnoses = \App\Diagnosis::where('doctor_id',$id)->get();
        $client_ids = array();
        foreach($diagnoses as $diag){
            array_push($client_ids, $diag->client->id);
        }
        $client_ids = array_unique($client_ids);
        $clients = array();
        foreach($client_ids as $id){
            array_push($clients, \App\Models\Client::where('id',$id)->first());
        }
        // print_r($client_ids) ;
        return view('doctor/patient',['clients'=>$clients]);

        // return view('doctor/patient',['diagnoses'=>$diagnoses]);
    }
    public function createDiagnosis()
    {
        return view('doctor/diagnosis/create');
    }
    public function editDiagnosis(Diagnose $diag)
    {
        return view('doctor/diagnosis/edit')
              ->with('diagnosis',$diag);
    }
}
