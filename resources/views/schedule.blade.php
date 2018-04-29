@extends('layouts.master')

@push('meta')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
@endpush

@push('style')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <style>
        html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

        textarea {
            width: 100%;
        }

        input {
            width: 100%;}

        .panel-heading {
            background-color: #f8f9fa;
            border: 7px solid;
            border-color: #f8f9fa;
        }
        .panel-primary {
            margin-top: 10px;
            border: 5px solid;
            border-radius: 5px;
            border-color: #f8f9fa;
        }
        .form-group {
            padding: 7px;
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
        <div class="panel-heading">Test</div>
        <div class="panel-body">
            <form action="">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="name">
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-3">
                        <div class="form-group">
                            <label for="start_date">Start</label>
                            <input type="datetime-local" name="start_date">
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 col-sm-3">
                        <div class="form-group">
                            <label for="end_date">End</label>
                            <input type="datetime-local" name="end_date">
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="desciption">Description</label>
                            <textarea name="description"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop