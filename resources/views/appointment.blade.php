@extends('layouts.master')

@section('title', Auth::user()->username )

@section('navbar')
    @include('inc.navbar')
@stop

@section('content')

@stop