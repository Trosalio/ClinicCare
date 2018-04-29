@extends('layouts.master')
@section('page-title')
    Create a Diagnosis for {{ $appointment->id }}
@stop

@section('content')
    <div class="container">
        <h2>Appointment</h2>
        <form method="POST" action="{{ route('doctor.storeDiagnosis') }}">
            <ul>
                {{ $appointment }}
            </ul>

            <button type="button" class="btn btn-primary" href="{{ route('doctor.dashboard') }}">History</button>
            <button type="button" class="btn btn-success" href="{{ route('doctor.dashboard') }}">Save</button>
            <button type="button" class="btn btn-danger" href="{{ route('doctor.dashboard') }}">Cancel</button>
        </form>
    </div>

@endsection
@push('script')
    <script src="{{ asset('js/diagnosis-med.js') }}"></script>
@endpush
