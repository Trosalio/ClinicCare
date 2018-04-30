@extends('layouts.master')
@section('page-title')
    Diagnosis Detail - {{ $diagnose->id }}
@stop
@section('content')
  <div class="container">
    <form method="POST"
          action="/doctor/diagnose/show/{{ $diagnose->id }}">
          @csrf
  <div class="form-group row">
    <label for="patientFristname" class="col-sm-2 col-form-label">Firstname</label>
    <div class="col-xs-6">
      <input type="text" readonly class="form-control-plaintext" id="patientFristname" value="{{$diagnose->appointment->client->firstname}}">
    </div>
    <label for="patientLastname" class="col-sm-2 col-form-label">Lastname</label>
    <div class="col-xs-6">
      <input type="text" readonly class="form-control-plaintext" id="patientLastname" value="{{$diagnose->appointment->client->lastname}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="age" class="col-sm-2 col-form-label">Age</label>
    <div class="col-xs-6">
      <input type="text" readonly class="form-control-plaintext" id="patientAge" value="{{$diagnose->appointment->client->age}}">
    </div>
    <label  class="col-xs-2 col-form-label">years old</label>

  </div>
  <div class="form-group row">
    <label for="congenitalDisease" class="col-sm-2 col-form-label">Congenital disease</label>
    <div class="col-xs-10">
      <textarea readonly class="form-control" id="congenitalDisease" rows="2" cols="60">{{ $diagnose->appointment->client->health_condition ?? 'None.' }}</textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="date" class="col-sm-2 col-form-label">Date</label>
    <div class="col-xs-6">
      <input type="text" readonly class="form-control-plaintext" id="Date" value="{{ date("d-m-Y", $diagnose->created_at->getTimestamp()) }}">
    </div>
  </div>
  <div class="form-group row">
    <label for="diagnosis" class="col-sm-2 col-form-label">Diagnosis</label>
    <div class="col-xs-6">
      <textarea class="form-control" id="diagnosis" name="opinion" rows="4" cols="60">{{ $diagnose->opinion }}</textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="medicine" class="col-sm-2 col-form-label">Medicine</label>
    <div class="col-xs-6" id="to-do">
           <input type="text" class="form-control" id="med" name="medicine" value="{{ $diagnose->medicine }}">

  </div>
  </div>

  <a type="button" class="btn btn-primary" href="{{ route('doctor.dashboard') }}">Medical Histories</a>
  <input type="submit" class="btn btn-success" value="Save">
  <a type="button" class="btn btn-danger" href="{{ route('doctor.dashboard') }}">Cancel</a>
</form>
  </div>

@endsection
@push('script')
    <script src="{{ asset('js/diagnosis-med.js') }}"></script>
@endpush
