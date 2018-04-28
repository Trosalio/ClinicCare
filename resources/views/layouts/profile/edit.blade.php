@extends('layouts.master')

@section('title', Auth::user()->username )

@section('content')
    <h1>Profile: {{ ucfirst(Auth::user()->username) }}</h1>
    <a href="{{ route('profile') }}"><i class="fas fa-arrow-left"></i> Back to Profile</a>
    @if(Auth::user()->client)
        {{--display error messages--}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST"
              action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')
            <hr class="mb-4">
            <h3>Client Info</h3>
            <!--F & L name -->
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label class="col-3" for="firstname"><strong>First name</strong></label>
                    <input class="form-control col-md-10" type="text" id="firstname" name="firstname"
                           value="{{ old('firstname') ?? Auth::user()->client->firstname }}"/>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label class="col-3" for="lastname"><strong>Last name</strong></label>
                    <input class="form-control col-md-10" type="text" id="lastname" name="lastname"
                           value="{{ old('lastname') ?? Auth::user()->client->lastname }}"/>
                </div>
            </div>
            <!--ID & Tel No -->
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label class="col-3" for="id_no"><strong>Citizen number</strong></label>
                    <input class="form-control col-md-10" type="text" id="id_no" name="id_no"
                           value="{{ old('id_no') ?? Auth::user()->client->id_no }}"/>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label class="col-3" for="tel_no"><strong>Telephone number</strong></label>
                    <input class="form-control col-md-10" type="text" id="tel_no" name="tel_no"
                           value="{{ old('lastname') ?? Auth::user()->client->tel_no }}"/>
                </div>
            </div>
            <!--Weight & Height -->
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label class="col-3" for="weight"><strong>Weight</strong></label>
                    <input class="form-control col-md-10" type="number" id="weight" name="weight" min="1" max="500"
                           value="{{ old('weight') ?? Auth::user()->client->weight }}"/>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label class="col-3" for="height"><strong>Height</strong></label>
                    <input class="form-control col-md-10" type="number" id="height" name="height" min="1" max="300"
                           value="{{ old('height') ?? Auth::user()->client->height }}"/>
                </div>
            </div>
            <!--Gender & Blood Type -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <strong class="col-3">Gender</strong>
                    <div class="col-12">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="male"
                                   name="gender"
                                   class="custom-control-input"
                                   value="m" {{ (old('gender') ?? Auth::user()->client->gender) === 'm' ? 'checked' : '' }}>
                            <label class="custom-control-label"
                                   for="male">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="female"
                                   name="gender"
                                   class="custom-control-input"
                                   value="f"
                                    {{ (old('gender') ?? Auth::user()->client->gender) === 'f' ? 'checked' : '' }}>
                            <label class="custom-control-label"
                                   for="female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="col-3" for="blood_type"><strong>Blood Type</strong></label>
                    <div class="col-10 p-0">
                        <select class="form-control" id="blood_type" name="blood_type">
                            @foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $blood_type)
                                <option value="{{ $blood_type }}"
                                        {{ (old('blood_type') ?? Auth::user()->client->blood_type) === $blood_type ? 'selected' : '' }}>
                                    {{ $blood_type }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- Intolerance(s) (Optional) -->
            <div class="row">
                <div class="col-12 mb-3">
                    <strong class="col-3">Intolerance(s)</strong>

                    <div class="col-12">
                <textarea class="form-control" id="intolerances" name="intolerances"
                          cols="80" rows="5"
                          placeholder="Optional">{{ old('intolerances') ??  Auth::user()->client->intolerances  }}</textarea>
                    </div>
                </div>
            </div>
            <!-- Health Condition(s)(s) (Optional) -->
            <div class="row">
                <div class="col-12 mb-3">
                    <strong class="col-3">Health Condition(s)</strong>
                    <div class="col-12">
                <textarea class="form-control" id="health_conditions" name="health_conditions"
                          cols="80" rows="5"
                          placeholder="Optional">{{ old('health_conditions') ??  Auth::user()->client->health_conditions  }}</textarea>
                    </div>
                </div>
            </div>
            @if(Auth::user()->doctor)
                <hr class="mb-4">
                <h3>Doctor Info</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Work Days(Between Weekdays)</h5>
                        <div class="form-group row">
                            <div class="form-group col-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="all_day"
                                           name="work_day"
                                           class="custom-control-input"
                                           value="0" {{ empty(old('work_day')) ? 'checked' : (old('work_day') === 0) ? 'checked' : '' }}>
                                    <label class="custom-control-label"
                                           for="all_day">All WeekDays</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="select_day"
                                           name="work_day"
                                           class="custom-control-input"
                                           value="1" {{ empty(old('work_day')) ? '' : (old('work_day') === 1) ? 'checked' : '' }}>
                                    <label class="custom-control-label"
                                           for="select_day">Select Days</label>
                                </div>
                            </div>
                            <div id="select-custom-day" class="form-group col-12" style="display: none">
                                @foreach(["1" => "Monday", "2" => "Tuesday", "3" => "Wednesday", "4" => "Thursday", "5" => "Friday"] as $index => $day)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="weekday[]"
                                               id="{{ 'weekday-'.$index }}"
                                               value="{{ $index }}" {{ in_array($index, json_decode(Auth::user()->doctor->weekday)) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="{{ 'weekday-'.$index }}">{{ $day }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h5>Work Hours(From 9-17)</h5>
                        <div class="form-group row">
                            <div class="form-group row col-md-6">
                                <label class="col-sm-3 col-md-2" for="start_hour">
                                    <strong>From </strong>
                                </label>
                                <input class="form-control col-sm-7 col-md-8" type="number"
                                       id="start_hour" name="start_hour"
                                       value="{{ old('start_hour') ?? Auth::user()->doctor->start_hour }}" min="9"
                                       max="16"/>
                            </div>
                            <div class="form-group row col-md-6">
                                <label class="col-sm-3 col-md-2" for="end_hour">
                                    <strong>To </strong>
                                </label>
                                <input class="form-control col-sm-7 col-md-8" type="number"
                                       id="end_hour" name="end_hour"
                                       value="{{ old('end_hour') ?? Auth::user()->doctor->end_hour }}" min="10"
                                       max="17"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="col-3" for="medical_license_no"><strong>Medical License</strong></label>
                        <div class="col-6">
                            <input class="form-control col-md-10" type="text" id="medical_license_no"
                                   name="medical_license_no"
                                   value="{{ old('medical_license_no') ?? Auth::user()->doctor->medical_license_no }}"/>
                        </div>
                    </div>
                </div>
                @push('script')
                    <script src="{{ asset('js/workday-info.js') }}"></script>
                @endpush
            @endif
            <hr class="mb-4">
            <div class="text-center mb-4">
                <button type="submit" class="btn btn-primary mr-4">
                    Save the Change
                </button>
                <a class="btn btn-secondary" href="{{ route('users.index')
             }}">Cancel</a>
            </div>
        </form>
    @endif
@stop