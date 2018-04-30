@extends('layouts.master')

@section('navbar')
    @include('doctor.inc.navbar')
@stop

@section('content')
    <div class="container">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <h1>Appointment</h1>
            <div class="table-responsive">
                <table id="diagnosis-table" class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Firstname</th>
                        <th>LastName</th>
                    </tr>
                    </thead>
                    @foreach($appointments as $appointment)
                        <tbody>
                        @if ($appointment->status === 1)
                            <tr onclick="window.location.assign('{{ route('doctor.createDiagnosis', ['appointment' => $appointment]) }}')">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $appointment->start_date }}</td>
                                <td>{{ $appointment->client->firstname }}</td>
                                <td>{{ $appointment->client->lastname }}</td>
                            </tr>
                        @endif
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
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
