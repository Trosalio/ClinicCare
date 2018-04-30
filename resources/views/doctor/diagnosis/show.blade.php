@extends('layouts.master')
@section('title', 'Medical Diagnosis' )
@section('navbar')
    @include('doctor.inc.navbar')
@stop
@section('content')
    <h1>Medical Diagnosis</h1>
    <hr/>
    <div class="table-responsive">
        <table id="diagnosis-table" class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Medicine</th>
                <th>Opinion</th>
            </tr>
            </thead>

            @foreach($diagnoses as $diagnose)
            <tbody>
                <tr onclick="window.location.assign('{{ route('doctor.editDiagnosis', ['diagnose' => $diagnose]) }}')">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $diagnose->created_at }}</td>
                    <td>{{ $diagnose->appointment->client->firstname }}</td>
                    <td>{{ $diagnose->appointment->client->lastname }}</td>
                    <td>{{ $diagnose->medicine }}</td>
                    <td>{{ $diagnose->opinion }}</td>
                </tr>
            @endforeach
            </tbody>

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
            $('#diagnosis-table').DataTable();
        });
    </script>
    @endpush
    @stop
