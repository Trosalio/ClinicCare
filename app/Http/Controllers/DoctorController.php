<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Diagnosis;
use PDF;
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
      // to find client_id
      $a = Appointment::where('id',$request['appointment'] )->get();
      foreach ($a as $b) {
          $c= $b->client_id;
      }
      //
      $request->validate([
          'diagnosis' => 'required',
          'medicine' => 'required'
      ]);
      $diagnosis = new Diagnosis;
      $diagnosis->appointment_id = $request['appointment'];
      $diagnosis->client_id = $c;
      $diagnosis->doctor_id = Auth::user()->doctor->id;
      $diagnosis->opinion = $request['diagnosis'];
      $diagnosis->medicine = $request['medicine'];
      $diagnosis->save();

      // want to delete queue in dashboard after create diagnosis

      return redirect('doctor/dashboard');
    }

    public function editDiagnosis(Diagnosis $diagnose)
    {
        return view('doctor/diagnosis/edit')
            ->with('diagnose', $diagnose);
    }
    public function updateDiagnosis(Diagnosis $diagnose, Request $request)
    {
      $validatedData = $request->validate([
          'opinion' => 'required',
          'medicine' => 'required'
      ]);

      $diagnose->update($validatedData);
      return redirect('doctor/diagnose/show');
    }
    public function savePDF(Diagnosis $diagnose)
    {
        $pdf = PDF::loadView('doctor.diagnosis.pdf-diagnosis', ['diagnose' => $diagnose])->setPaper('a4', 'postscape');
        return $pdf->download('Diagnosis.pdf');
    }
}
