@extends('inc.navbar')

@section('nav-sidebar')
    <li class="nav-item">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseUsers"
           data-parent="#accordion">
            <i class="fas fa-users"></i>
            <span class="nav-link-text">Doctors</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseUsers">
            <li class="nav-item">
                <a href="{{ url('schedule') }}"  class="nav-link">
                    <i class="fas fa-list-ul"></i>
                    <span class="nav-link-text">Schedule</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('doctor.dashboard') }}"  class="nav-link">
                    <i class="fas fa-list-ul"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('doctor.show') }}"  class="nav-link">
                    <i class="fas fa-list-ul"></i>
                    <span class="nav-link-text">Medical Diagnosis</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('doctor.showpatient') }}"  class="nav-link">
                    <i class="fas fa-list-ul"></i>
                    <span class="nav-link-text">My patient</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="fas fa-plus-circle"></i>
                    <span class="nav-link-text">DDD</span>
                </a>
            </li>
        </ul>
    </li>
@stop