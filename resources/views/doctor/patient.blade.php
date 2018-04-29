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
                <th>Blood type</th>
                <th>Telephone No.</th>
            </tr>
            </thead>
            @foreach($clients as $client)
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$client->firstname}}</td>
                        <td>{{$client->lastname}}</td>
                        <td>{{$client->blood_type}}</td>
                        <td>{{$client->tel_no}}</td>
                    </tr>

                </tbody>
            @endforeach
            
        </table>
    </div>
    @stop