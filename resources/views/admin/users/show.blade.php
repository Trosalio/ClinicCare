@extends('layouts.master')

@section('page-title')
    User Detail - {{ $user->id }}
@stop

@section('content')
    @if ($status)
        <div class="alert alert-success">
            {{ $status }}
        </div>
    @endif
    <h1>Profile: {{ ucfirst($user->username) }}</h1>
    <a href="{{ route('users.index') }}"><i class="fas fa-arrow-left"></i> Back to User List</a>
    <hr class="mb-4">
    <div class="row">
        <div class="col-md-6 mb-3">
            <strong class="col-3">Username</strong>
            <div class="col-12">
                {{ $user->username }}
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <strong class="col-3">E-mail</strong>
            <div class="col-12">
                {{ $user->email }}
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <strong class="col-3">Role:</strong>
            <div class="col-12">
                {{ ucfirst($user->role) }}
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <strong class="col-3">Join Date:</strong>
            <div class="col-12">
                {{ $user->created_at->diffForHumans() }}
            </div>
        </div>
    </div>

    @if($user->client)
        <hr class="mb-4">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong class="col-3">First name</strong>
                <div class="col-12">
                    {{ $user->client->firstname ?? 'No first name given'}}
                </div>

            </div>
            <div class="col-md-6 mb-3">
                <strong class="col-3">Last name</strong>
                <div class="col-12">
                    {{ $user->client->lastname ?? 'No last name given'}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong class="col-3">Citizen number</strong>
                <div class="col-12">
                    {{ $user->client->id_no ?? 'No Citizen number given'}}
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <strong class="col-3">Telephone number</strong>
                <div class="col-12">
                    {{ $user->client->tel_no ?? 'No Telephone number given'}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong class="col-3">Weight:</strong>
                <div class="col-12">
                    {{ $user->client->weight ?? 'No weight given'}}
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <strong class="col-3">Height</strong>
                <div class="col-12">
                    {{ $user->client->height ?? 'No height given'}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong class="col-3">Gender</strong>
                <div class="col-12">
                    {{ ($user->client->gender === 'm' ? 'Male' : 'Female') ?? 'No gender info given'}}
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <strong class="col-3">Blood Type</strong>
                <div class="col-12">
                    {{ $user->client->blood_type ?? 'No bloody type info given'}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <strong class="col-3">Intolerance(s):</strong>
                <div class="col-12">
                    {{ $user->client->intolerances ?? 'Can tolerate everything'}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <strong class="col-3">Health Condition(s):</strong>
                <div class="col-12">
                    {{  $user->client->health_conditions ?? 'In good condition'}}
                </div>
            </div>
        </div>
        @if($user->doctor)
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <strong class="col-3">Work Days</strong>
                    <div class="col-12">
                        @php
                            $weekday = json_decode($user->doctor->weekday);
                            $displayWeekday = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                        @endphp
                        @if(!$user->doctor->work_day || count($weekday) === 5)
                            Whole Weekdays
                        @else
                            |
                            @foreach($weekday as $index)
                                {{ $displayWeekday[$index-1] }} |
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <strong class="col-3">Work Hours</strong>
                    <div class="col-12">
                        {{ 'From'.$user->doctor->start_hour.' to '.$user->doctor->end_hour }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <strong class="col-3">Medical License:</strong>
                    <div class="col-12">
                        {{  $user->doctor->medical_license_no ?? 'Not Available' }}
                    </div>
                </div>
            </div>
        @endif
    @endif
    @unless($user->isAdmin())
        <div class="card-footer">
            <div class="row justify-content-center">
                @include('admin.inc.show.changerole')
                <div class="mx-4"></div>
                @include('admin.inc.show.deleteuser')
            </div>
        </div>
    @endunless
@stop