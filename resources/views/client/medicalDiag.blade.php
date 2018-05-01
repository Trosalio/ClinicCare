@extends('layouts.master')
@section('title')
    @Auth
    {{ ucfirst(Auth::user()->username) }}'s Medical Diagnosis
    @endauth
@stop
@section('navbar')
    @include('client.inc.navbar')
@stop
@section('content')
    <h1>My Medical Diagnosis</h1>
    <hr/>
    <div class="table-responsive">
        <table id="patientDiag-table" class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Doctor's Name</th>
                <th>Lastname</th>
                <th>Medicine</th>
                <th>Opinion</th>
            </tr>
            </thead>
            @foreach($diagnoses as $diag)
                <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$diag->appointment->client->firstname}}</td>
                    <td>{{$diag->appointment->client->lastname}}</td>
                    <td>{{$diag->medicine}}</td>
                    <td>{{$diag->opinion}}</td>

                </tr>

                </tbody>
            @endforeach

        </table>
    </div>
    @push('style')
        <style>
            tbody tr:hover {
                color: blue;
                cursor: pointer;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    @endpush
    @push('script')
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#patientDiag-table').DataTable();
            });
        </script>
    @endpush

@stop