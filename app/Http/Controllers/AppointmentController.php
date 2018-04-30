<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use lluminate\Support\Facades\Redirect;
use App\Appointment;
use PDF;

class AppointmentController extends Controller
{
    public function index($id)
    {
        $app = Appointment::find($id);
        return view('/appointment', compact('app'));
    }

    public function statusUpdate(Appointment $app, Request $request)
    {
        if ($request['submit'] == 'Accept') {
            $app->status = 1;
        } elseif ($request['submit'] == 'Decline') {
            $app->status = 2;
        }
        $app->save();
        return redirect('/appointment/' . $app->id);
    }

    public function savePDF($id)
    {
        $app = Appointment::find($id);
        $pdf = PDF::loadView('client.appointment-pdf', ['app' => $app])->setPaper('a4', 'landscape');
        return $pdf->download('appointment-' . $id . '.pdf');
    }
}
