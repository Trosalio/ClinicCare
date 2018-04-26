@extends('layouts.master')

@section('page-title')
    User Detail - {{ $user->id }}
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                <i class="fas fa-user-circle"></i>
                <strong data-toggle="tooltip"
                        data-placement="right"
                        title="Username">
                    {{$user->username}}
                </strong>
            </h2>
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                <strong>E-mail: </strong>
                {{ $user->email }}
            </li>
            <li class="list-group-item">
                <strong>Role: </strong>
                {{ $user->role }}
            </li>
            <li class="list-group-item">
                <strong>Joining Date: </strong>
                <span data-toggle="tooltip" data-placement="right"
                      title="{{ $user->created_at }}">
                    {{$user->created_at->diffForHumans() }}
                </span>
            </li>
        </ul>
        @if($user->role !== 'admin')
            <div class="card-footer">
                <div class="row justify-content-center">
                    @include('admin.inc.show.changerole')
                    <div class="mx-4"></div>
                    @include('admin.inc.show.deleteuser')
                </div>
            </div>
        @endif
    </div>
@endsection
