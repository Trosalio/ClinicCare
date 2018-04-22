@extends('layouts.master')

@section('title', 'ADMIN')

@section('navbar')
    @include('inc.navbar')
@stop

@section('content')
    <div class="container-fluid">
        <main>
            @include('admin.inc.dashboard.reports')
        </main>
    </div>
@stop

@push('script')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endpush

