@extends('layouts.master')

@push('style')
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            /* height: 100%; */
            margin: 0;
        }

        .panel-heading {
            font-size: 30px;
            background-color: #f8f9fa;
            border: 7px solid;
            border-color: #f8f9fa;
        }

        .panel-primary {
            margin-top: 10px;
            margin-bottom: 10px;
            border: 15px solid;
            border-radius: 5px;
            border-color: #f8f9fa;
        }

        .col-sm-4, .col-sm-8 {
            /* margin: 1px 1px 1px 1px; */
            border: 1px solid;
            border-color: #f8f9fa;
            background-color: #e6fff2;
        }

        .font-weight-bold {
            text-align: center;
            font-size: 17px;
            background-color: #99ffcc;
        }

        .sep {
            background-color: #ffffff;
        }
    </style>
@endpush

@section('title', Auth::user()->username )

@if (Auth::check())
    @if (Auth::user()->role === 'client')
@section('navbar')
    @include('client.inc.navbar')
@stop
@elseif (Auth::user()->role === 'doctor')
@section('navbar')
    @include('doctor.inc.navbar')
@stop
@endif
@endif

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">ข้อมูลส่วนตัว</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xl-4 col-md-4 col-sm-4 font-weight-bold">
                        First Name:
                    </div>
                    <div class="col-xl-8 col-md-8 col-sm-8">
                        {{$app->client->firstname}}
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-4 font-weight-bold">
                        Last Name:
                    </div>
                    <div class="col-xl-8 col-md-8 col-sm-8">
                        {{$app->client->lastname}}
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-4 font-weight-bold">
                        ID No.:
                    </div>
                    <div class="col-xl-8 col-md-8 col-sm-8">
                        {{$app->client->id_no}}
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-4 font-weight-bold">
                        Gender:
                    </div>
                    <div class="col-xl-8 col-md-8 col-sm-8">
                        @if ($app->client->gender == 'm')
                            Male
                        @elseif ($app->client->gender == 'f')
                            Female
                        @endif
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-4 font-weight-bold">
                        Tel.:
                    </div>
                    <div class="col-xl-8 col-md-8 col-sm-8">
                        {{$app->client->tel_no}}
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-4 font-weight-bold">
                        Weight:
                    </div>
                    <div class="col-xl-8 col-md-8 col-sm-8">
                        {{$app->client->weight}}
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-4 font-weight-bold">
                        Height:
                    </div>
                    <div class="col-xl-8 col-md-8 col-sm-8">
                        {{$app->client->height}}
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-4 font-weight-bold">
                        Blood Type:
                    </div>
                    <div class="col-xl-8 col-md-8 col-sm-8">
                        {{$app->client->blood_type}}
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-4 font-weight-bold">
                        Intolerances:
                    </div>
                    <div class="col-xl-8 col-md-8 col-sm-8">
                         @if ($app->client->intolerances == null)
                            -
                        @else
                            {{$app->client->intolerances}}
                        @endif
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-4 font-weight-bold">
                        Health Conditions:
                    </div>
                    <div class="col-xl-8 col-md-8 col-sm-8">
                        @if ($app->client->health_conditions == null)
                            -
                        @else
                            {{$app->client->health_conditions}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">คำร้องขอจองเวลาตรวจ</div>
            <div class="panel-body">
                <form action="/appointment/{{ $app->id }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xl-4 col-md-4 col-sm-4 font-weight-bold">
                            Title:
                        </div>
                        <div class="col-xl-8 col-md-8 col-sm-8">
                            {{$app->name}}
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-4 font-weight-bold">
                            Description:
                        </div>
                        <div class="col-xl-8 col-md-8 col-sm-8">
                            {{$app->description}}
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-4 font-weight-bold">
                            Start:
                        </div>
                        <div class="col-xl-8 col-md-8 col-sm-8">
                            {{$app->start_date}}
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-4 font-weight-bold">
                            End:
                        </div>
                        <div class="col-xl-8 col-md-8 col-sm-8">
                            {{$app->end_date}}
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-4 font-weight-bold">
                            Doctor:
                        </div>
                        <div class="col-xl-8 col-md-8 col-sm-8">
                            {{$app->doctor->user->client->firstname}} {{$app->doctor->user->client->lastname}}
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-4 font-weight-bold">
                            Status:
                        </div>
                        <div class="col-xl-8 col-md-8 col-sm-8">
                            @if ($app->status == 0)
                                Pending
                            @elseif ($app->status == 1)
                                Accepted
                            @elseif ($app->status == 2)
                                Declined
                            @endif
                        </div>
                        @if(Auth::user()->role === 'doctor')
                            <div class="col-xl-3 col-md-3 col-sm-3 text-center sep"></div>
                            <div class="col-xl-2 col-md-2 col-sm-2">
                                <input type="submit" value="Accept" name="submit" class="btn btn-success"/>
                            </div>
                            <div class="col-xl-2 col-md-2 col-sm-2">
                                <input type="submit" value="Decline" name="submit" class="btn btn-danger"/>
                            </div>
                            <div class="col-xl-2 col-md-2 col-sm-2">
                                <a class="btn btn-info" href="{{ route('appointment.savePDF', [ 'app' => $app]) }}"
                                target="_blank">Save as PDF</a>
                            </div>
                            <div class="col-xl-3 col-md-3 col-sm-3 sep"></div>
                        @elseif (Auth::user()->role === 'client' and $app->status == 1)
                            <div class="col-sm-2 offset-sm-5 text-left">
                                <a class="btn btn-info" href="{{ route('appointment.savePDF', ['app' => $app]) }}"
                                   target="_blank">Save as PDF</a>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop