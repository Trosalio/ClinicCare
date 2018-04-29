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
            <div class="table-responsive">
                <table id="user-table" class="table table-hover">
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
@stop
