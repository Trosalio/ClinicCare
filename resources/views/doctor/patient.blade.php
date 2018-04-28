@extends('layouts.master')
@section('title', 'My Patients' )
@section('navbar')
    @include('doctor.inc.navbar')
@stop
@section('content')
    <h1>My patients</h1>
    <hr/>
    <div class="table-responsive">
        <table id="patient-table" class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Firstname</th>
                <th>Lastname</th>
            </tr>
            </thead>
            {{ $diagnoses}}
            <tbody>
            </tbody>
            
        </table>
    </div>
    @stop