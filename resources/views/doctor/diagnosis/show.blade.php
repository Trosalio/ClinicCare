@extends('layouts.master')
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
                <th>Opinion</th>
            </tr>
            </thead>

            @foreach($diagnoses as $diag)
            <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $diag->created_at }}</td>
                    <td>{{ App\Models\Client::findOrNew($diag->client_id)->firstname }}</td>
                    <td>{{ App\Models\Client::findOrNew($diag->client_id)->lastname }}</td>
                    <td>{{ $diag->opinion }}</td>
                </tr>
            @endforeach
            </tbody>
            
        </table>
    </div>
    @stop
