@extends('layouts.master')

@section('title', 'ADMIN')

@section('content')
    <div class="container-fluid">
        <main>
            @include('admin.users.reports')
        </main>
    </div>
@stop