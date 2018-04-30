@extends('layouts.master')
@section('page-title')
    Create a Diagnosis for {{ $appointment->id }}
@stop

@section('content')
    <div class="container">
        <h2>Diagnosis</h2>
        <form method="POST" action="{{ route('doctor.storeDiagnosis', compact('appointment')) }}">
          @csrf
            <div class="form-group row">
              <label for="patientFristname" class="col-sm-2 col-form-label">Firstname</label>
              <div class="col-xs-6">
                <input type="text" readonly class="form-control-plaintext" id="patientFristname" value="{{$appointment->client->firstname}}">
              </div>
              <label for="patientLastname" class="col-sm-2 col-form-label">Lastname</label>
              <div class="col-xs-6">
                <input type="text" readonly class="form-control-plaintext" id="patientLastname" value="{{$appointment->client->lastname}}">
              </div>
            </div>

            <div class="form-group row">
              <label for="congenitalDisease" class="col-sm-2 col-form-label">Congenital disease</label>
              <div class="col-xs-10">
                <textarea readonly class="form-control" id="congenitalDisease" rows="2" cols="60">{{ $appointment->client->health_condition ?? 'None.' }}

                </textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="date" class="col-sm-2 col-form-label">Date</label>
              <div class="col-xs-6">
                <input type="text" readonly class="form-control-plaintext" id="date" value="{{ date("d-m-Y") }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="diagnosis" class="col-sm-2 col-form-label">Diagnosis</label>
              <div class="col-xs-6">
                <textarea class="form-control" name="diagnosis" rows="4" cols="60">
                  @if($errors->has('diagnosis'))
                      <div class="invalid-feedback">
                          {{ $errors->first('diagnosis') }}
                      </div>
                  @endif
                </textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="medicine" class="col-sm-2 col-form-label">Medicine</label>
              <div class="col-xs-6" id="to-do">
                     <textarea type="text" class="form-control" id="med" cols="60" name="medicine" value="{{ old('medicine') }}"> </textarea>
            </div>
            </div>
            <input type="submit" class="btn btn-success" name="save" value="submit">
            <a  class="btn btn-danger" href="{{ route('doctor.dashboard') }}">Cancel</a>
        </form>
    </div>

@endsection
@push('script')
    <script src="{{ asset('js/diagnosis-med.js') }}"></script>
@endpush
