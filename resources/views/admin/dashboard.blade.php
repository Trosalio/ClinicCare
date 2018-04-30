@extends('layouts.master')

@section('title', 'ADMIN')

@section('navbar')
    @include('admin.inc.navbar')
@stop

@section('content')
    <div class="container-fluid">
        @if ($status)
            <div class="alert alert-success">
                {{ $status }}
            </div>
        @endif
        <main>
            @include('admin.users.reports')
        </main>
    </div>
@stop