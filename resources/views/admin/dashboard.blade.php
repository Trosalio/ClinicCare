@extends('layouts.master')

@section('title', 'ADMIN')

@section('navbar')
    @include('admin.inc.navbar')
@stop

@section('content')
    <div class="container-fluid">
        <main>
            @include('admin.users.reports')
        </main>
    </div>
@stop