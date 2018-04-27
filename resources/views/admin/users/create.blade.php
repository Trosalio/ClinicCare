@extends('layouts.master')

@section('title', 'Creating User' )

@section('content')

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
    <h1>Create a User</h1>
    <hr class="mb-4">
    <div class="col-lg-10 offset-lg-1">
        <form method="POST"
              action="{{ route('users.store') }}">
            @csrf
            <h3>User Info</h3>
            <br/>
            <div class="form-group row">
                <label class="col-sm-3 col-md-2" for="username">
                    <strong>Username:</strong>
                </label>
                <input class="form-control col-sm-9 col-md-4" type="text"
                       id="username" name="username"
                       value="{{ old('username') }}"/>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-md-2" for="email">
                    <strong>E-mail:</strong>
                </label>
                <input class="form-control col-sm-9 col-md-4" type="email"
                       id="email" name="email"
                       value="{{ old('email') }}"/>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-md-2" for="password">
                    <strong>Password: </strong></label>
                <input class="form-control col-sm-9 col-md-4" id="password" type="password" name="password"/>
                <small id="password" class="col-sm-12 form-text text-muted">
                    Your password must be 6-20 characters long.
                </small>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-md-2" for="password_confirmation">
                    <strong>Confirm Password: </strong></label>
                <input class="form-control col-sm-9 col-md-4" id="password_confirmation" type="password"
                       name="password_confirmation"/>
                <small id="password" class="col-sm-12 form-text text-muted">
                    Re-enter your password.
                </small>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-md-2">
                    <strong>Register as:</strong>
                </label>
                @foreach($roles as $role)
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="{{ $role }}"
                               name="role"
                               class="custom-control-input"
                               value="{{ $role }}" {{ old
                                   ('role') === $role?
                                   'checked' : ''}}>
                        <label class="custom-control-label"
                               for="{{ $role }}">{{ ucfirst($role) }}</label>
                    </div>
                @endforeach
            </div>
            <div id="client-info" style="display: none">
                <hr class="mb-4">
                <h3>Client Info</h3>
                <br/>
                <!--F & L name -->
                <div class="row">
                    <div class="form-group row col-md-6">
                        <label class="col-sm-3 col-md-4" for="firstname">
                            <strong>First name:</strong>
                        </label>
                        <input class="form-control col-sm-9 col-md-8" type="text"
                               id="firstname" name="firstname"
                               value="{{ old('firstname') }}"/>
                    </div>
                    <div class="form-group row col-md-6">
                        <label class="col-sm-3 col-md-4" for="lastname">
                            <strong>Last Name:</strong>
                        </label>
                        <input class="form-control col-sm-9 col-md-8" type="text"
                               id="lastname" name="lastname"
                               value="{{ old('lastname') }}"/>
                    </div>
                </div>
                <!--ID & Tel No -->
                <div class="row">
                    <div class="form-group row col-md-6">
                        <label class="col-sm-3 col-md-4" for="id_no">
                            <strong>Citizen Number:</strong>
                        </label>
                        <input class="form-control col-sm-9 col-md-8" type="text"
                               id="id_no" name="id_no"
                               value="{{ old('id_no') }}"/>
                    </div>
                    <div class="form-group row col-md-6">
                        <label class="col-sm-3 col-md-4" for="tel_no">
                            <strong>Telephone Number:</strong>
                        </label>
                        <input class="form-control col-sm-9 col-md-8" type="text"
                               id="tel_no" name="tel_no"
                               value="{{ old('tel_no') }}"/>
                    </div>
                </div>
                <!--Weight & Height -->
                <div class="row">
                    <div class="form-group row col-md-6">
                        <label class="col-sm-3 col-md-4" for="weight">
                            <strong>Weight (Kilograms):</strong>
                        </label>
                        <input class="form-control col-sm-9 col-md-8" type="number"
                               id="weight" name="weight"
                               value="{{ old('weight') }}" min="1" max="500"/>
                    </div>
                    <div class="form-group row col-md-6">
                        <label class="col-sm-3 col-md-4" for="height">
                            <strong>Height (Centimeters):</strong>
                        </label>
                        <input class="form-control col-sm-9 col-md-8" type="number"
                               id="height" name="height"
                               value="{{ old('height') }}" min="20" max="300"/>
                    </div>
                </div>
                <!--Gender & Blood Type -->
                <div class="row">
                    <div class="form-group row col-md-6">
                        <label class="col-sm-3 col-md-4">
                            <strong>Gender:</strong>
                        </label>
                        @foreach($gender as $g)
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="{{ $g }}"
                                       name="gender"
                                       class="custom-control-input"
                                       value="{{ $g }}" {{ (old('gender') === $g) ? 'checked' : '' }}>
                                <label class="custom-control-label"
                                       for="{{ $g }}">{{ ($g === 'm') ? 'Male' : 'Female' }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group row col-md-6">
                        <label class="col-sm-3 col-md-4" for="blood_type"><strong>Blood Type:</strong></label>
                        <select class="form-control col-sm-9 col-md-8" id="blood_type" name="blood_type">
                            @foreach($blood_types as $blood_type)
                                <option value="{{ $blood_type }}" {{ old('blood_type') === $blood_type ? 'checked' : '' }}>{{ $blood_type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Intolerance(s) (Optional) -->
                <div class="form-group row">
                    <label class="col-sm-3 col-md-2" for="intolerances">
                        <strong>Intolerance(s):</strong>
                    </label>
                    <textarea class="form-control col-sm-9 col-md-10"
                              cols="80" rows="5"
                              id="intolerances" name="intolerances" placeholder="Optional">{{ old('intolerances') }}</textarea>
                </div>
                <!-- Health Condition(s)(Optional) -->
                <div class="form-group row">
                    <label class="col-sm-3 col-md-2" for="health_conditions">
                        <strong>Health Condition(s):</strong>
                    </label>
                    <textarea class="form-control col-sm-9 col-md-10"
                              cols="80" rows="5"
                              id="health_conditions" name="health_conditions" placeholder="Optional">{{ old('health_conditions') }}</textarea>
                </div>
            </div>
            <div id="doctor-info" style="display: none">
                <hr class="mb-4">
                <h3>Doctor Info</h3>
                <br/>
                <!-- Work Day and Hour -->
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
                                        <input class="form-check-input" type="checkbox" name="weekday[]" id="{{ 'weekday-'.$index }}"
                                               value="{{ $index }}">
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
                                       value="{{ old('start_hour') }}" min="9" max="16"/>
                            </div>
                            <div class="form-group row col-md-6">
                                  <label class="col-sm-3 col-md-2" for="end_hour">
                                    <strong>To </strong>
                                </label>
                                <input class="form-control col-sm-7 col-md-8" type="number"
                                       id="end_hour" name="end_hour"
                                       value="{{ old('end_hour') }}" min="10" max="17"/>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Medical License Number -->
                <div class="form-group row">
                    <label class="col-sm-3 col-md-2" for="medical_license_no">
                        <strong>Medical License:</strong>
                    </label>
                    <input class="form-control col-sm-5 col-md-4" type="text"
                           id="medical_license_no" name="medical_license_no"
                           value="{{ old('medical_license_no') }}"/>
                </div>
            </div>
            <hr class="mb-4">
            <div class="text-center mb-4">
                <button type="submit" class="btn btn-primary mr-4">
                    Create the User
                </button>
                <a class="btn btn-secondary" href="{{ route('users.index')
             }}">Cancel</a>
            </div>
        </form>
    </div>
@stop

@push('style')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha18/css/tempusdominus-bootstrap-4.min.css"/>
@endpush

@push('script')
    <script src="{{ asset('js/admin-create.js') }}"></script>
    <script src="{{ asset('js/workday-info.js') }}"></script>
@endpush