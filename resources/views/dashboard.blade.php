@extends('layouts.master')

@push('meta')
    <meta http-equiv="refresh" content="5; url={{$redirect}}"/>
@endpush

@section('title', Auth::user()->username )

@section('navbar')
    @include('inc.navbar')
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        You are logged in!
                        <br/>
                        Redirecting to the appropriate page...
                        or press the <a href="{{ $redirect }}">link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

