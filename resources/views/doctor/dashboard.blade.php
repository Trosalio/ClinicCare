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
                                @foreach($appointments as $appoint)
                                <tbody>
                                  @if ($appoint->status === 1)
                                    <tr onclick="window.location.assign('{{ route('doctor.createDiagnosis', [$appoint]) }}')">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $appoint->start_date }}</td>
                                        <td>{{ App\Models\Client::findOrNew($appoint->client_id)->firstname }}</td>
                                        <td>{{ App\Models\Client::findOrNew($appoint->client_id)->lastname }}</td>
                                    </tr>
                                  @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
    </div>
@stop
