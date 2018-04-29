@extends('layouts.master')
@section('page-title')
    Diagnosis Detail - {{ $diagnose->id }}
@stop
@section('content')
  <div class="container">
    <form>
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
      <textarea class="form-control" id="diagnosis" rows="4" cols="60">{{ $diagnose->opinion }}</textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="medicine" class="col-sm-2 col-form-label">Medicine</label>
    <div class="col-xs-6" id="to-do">
      <form class="form-inline">
         <div class="form-group col-xs-6">
           <input class="form-control" type="text" id ="input" value ="{{ $diagnose->medicine }}">
         </div>
         <div class="form-group col-xs-6">
           <button class="btn btn-primary" id ="add" type="submit">Add Item</button>
         </div>
    </form>

      <ul id="list"></ul>

  </div>
  </div>

  <button type="button" class="btn btn-primary" href="{{ route('doctor.dashboard') }}">Medical Histories</button>
  <button type="button" class="btn btn-success" href="{{ route('doctor.dashboard') }}">Save</button>
  <button type="button" class="btn btn-danger" href="{{ route('doctor.dashboard') }}">Cancel</button>
</form>
  </div>

@endsection
@push('script')
    <script src="{{ asset('js/diagnosis-medicine.js') }}"></script>
@endpush
