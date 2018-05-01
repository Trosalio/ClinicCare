@extends('inc.navbar')

@section('nav-sidebar')
    <li class="nav-item">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseUsers"
           data-parent="#accordion">
            <i class="fas fa-user"></i>
            <span class="nav-link-text">Client</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseUsers">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-list-ul"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('schedule') }}" class="nav-link">
                    <i class="fas fa-list-ul"></i>
                    <span class="nav-link-text">Schedule</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('client.show') }}" class="nav-link">
                    <i class="fas fa-list-ul"></i>
                    <span class="nav-link-text">Medical Diagnosis</span>
                </a>
            </li>
        </ul>
    </li>
@Stop