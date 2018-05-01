@extends('layouts.master')

@section('title')
    @Auth
        {{ ucfirst(Auth::user()->username) }}'s Appointment
    @endauth
@stop

@section('navbar')
    @include('client.inc.navbar')
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
                <table id="user-table" class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Doctor's Name</th>
                        <th>Lastname</th>
                    </tr>
                    </thead>
                    @foreach($appointments as $appointment)
                        <tbody>
                        @if ($appointment->status === 1)
                            <tr>
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

