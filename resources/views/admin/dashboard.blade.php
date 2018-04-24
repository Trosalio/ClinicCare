@extends('layouts.master')

@section('title', 'ADMIN')

@section('content')
    <div class="container-fluid">
        <main>
            @include('admin.inc.dashboard.reports')
        </main>
    </div>
@stop