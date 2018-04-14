@extends('layouts.master')

@section('title', 'ADMIN')

@section('navbar')
    @include('inc.navbar')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Control Navbar --}}
            <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ $includedContent === 'reports'? 'active' : ''}}"
                           href="{{ route('admin.dashboard',['includedContent' => 'reports']) }}">
                            Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $includedContent ==='role-assignment'? 'active' : ''}}"
                           href="{{ route('admin.dashboard',['includedContent' => 'role-assignment'])}}">
                            Role Assignment</a>
                    </li>
                </ul>
            </nav>

            {{-- Display a content according to Control Navbar--}}
            <main class="col-sm-9  col-md-10 pt-3">
                @include('admin.inc.dashboard.'.$includedContent)
            </main>
        </div>
    </div>
@stop

