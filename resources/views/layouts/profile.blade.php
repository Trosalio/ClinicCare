@extends('layouts.master')

@section('title', Auth::user()->username )

@section('content')
    <h1>Profile: {{ ucfirst(Auth::user()->username) }}</h1>
    <hr class="mb-4">
    <div class="row">
        <div class="col-md-6 mb-3">
            <strong class="col-3">Username</strong>
            <div class="col-12">
                {{ Auth::user()->username }}
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <strong class="col-3">E-mail</strong>
            <div class="col-12">
                {{ Auth::user()->email }}
            </div>
        </div>
        <div class="col-12 mb-3">
            <strong class="col-3">Join Date:</strong>
            <div class="col-12">
                {{ Auth::user()->created_at->diffForHumans() }}
            </div>
        </div>
    </div>

    @if(Auth::user()->client)
        <hr class="mb-4">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong class="col-3">First name</strong>
                <div class="col-12">
                    {{ Auth::user()->client->firstname ?? 'No first name given'}}
                </div>

            </div>
            <div class="col-md-6 mb-3">
                <strong class="col-3">Last name</strong>
                <div class="col-12">
                    {{ Auth::user()->client->lastname ?? 'No last name given'}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong class="col-3">Citizen number</strong>
                <div class="col-12">
                    {{ Auth::user()->client->id_no ?? 'No Citizen number given'}}
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <strong class="col-3">Telephone number</strong>
                <div class="col-12">
                    {{ Auth::user()->client->tel_no ?? 'No Telephone number given'}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong class="col-3">Weight:</strong>
                <div class="col-12">
                    {{ Auth::user()->client->weight ?? 'No weight given'}}
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <strong class="col-3">Height</strong>
                <div class="col-12">
                    {{ Auth::user()->client->height ?? 'No height given'}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong class="col-3">Gender</strong>
                <div class="col-12">
                    {{ Auth::user()->client->gender ?? 'No gender info given'}}
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <strong class="col-3">Blood Type</strong>
                <div class="col-12">
                    {{ Auth::user()->client->blood_type ?? 'No bloody type info given'}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <strong class="col-3">Intolerance(s):</strong>
                <div class="col-12">
                    {{ Auth::user()->client->intolerances ?? 'Can tolerate everything'}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <strong class="col-3">Health Condition(s):</strong>
                <div class="col-12">
                    {{  Auth::user()->client->health_conditions ?? 'In good condition'}}
                </div>
            </div>
        </div>
        @if(Auth::user()->doctor)
            <hr class="mb-4">
            <div class="row">
                <div class="col-12 mb-3">
                    <strong class="col-3">Medical License:</strong>
                    <div class="col-12">
                        {{  Auth::user()->doctor->medical_license_no ?? 'Not Available' }}
                    </div>
                </div>
            </div>
        @endif
    @endif
@stop