@extends('layouts.master')

@push ('script')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar_details->script() !!}
@endpush

@push('style')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <style>
        html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                /* height: 100%; */
                margin: 0;
            }

        textarea {
            width: 100%;
        }

        input {
            width: 100%;
        }
        
        select {
            width: 100%;
        }

        .panel-heading {
            font-size: 30px;
            background-color: #f8f9fa;
            border: 7px solid;
            border-color: #f8f9fa;
        }

        .panel-primary {
            margin-top: 10px;
            border: 15px solid;
            border-radius: 5px;
            border-color: #f8f9fa;
        }

        .form-group {
            padding: 7px;
        }

        .btn {
            margin-bottom: 10px;
        }
    </style>
@endpush

@section('title', Auth::user()->username )

@section('navbar')
    @include('inc.navbar')
@stop

@section('content')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">ยื่นคำร้องขอจองเวลาตรวจ</div>
        <div class="panel-body">
            <form action="/schedule" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif (Session::has('warning'))
                            <div class="alert alert-danger">{{ Session::get('warning') }}</div>
                        @endif
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-3">
                        <div class="form-group">
                            <label for="start_date">Start</label>
                            <input type="datetime-local" name="start_date" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-3">
                        <div class="form-group">
                            <label for="end_date">End</label>
                            <input type="datetime-local" name="end_date" class="form-control">
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="desciption">Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="doctor">Doctor</label>
                            <select name="doctor">
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->user->client->firstname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-5 col-sm-5"></div>
                    <div class="col-xl-2 col-md-2 col-sm-2 text-center"> &nbsp;<br/>
                        <input type="submit" class="btn"/>
                    </div>
                    <div class="col-xl-5 col-md-5 col-sm-5"></div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Schedule</div>
        <div class="panel-body" id="calendar_panel">
            {!! $calendar_details->calendar() !!}
        </div>
    </div>
</div>
@stop