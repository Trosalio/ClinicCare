@extends('inc.navbar')

@section('nav-sidebar')
    <li class="nav-item">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseUsers"
           data-parent="#accordion">
            <i class="fas fa-users"></i>
            <span class="nav-link-text">Users</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseUsers">
            <li class="nav-item {{ url()->current() === Route('users.index') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="fas fa-list-ul"></i>
                    <span class="nav-link-text">Show users</span>
                </a>
            </li>
            @if(Auth::user()->isAdmin())
                <li class="nav-item {{ url()->current() === Route('users.create') ? 'active' : '' }}">
                    <a href="{{ route('users.create') }}" class="nav-link">
                        <i class="fas fa-plus-circle"></i>
                        <span class="nav-link-text">Create user...</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@stop