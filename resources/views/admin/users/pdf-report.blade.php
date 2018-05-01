@extends('layouts.pdf')

@section('content')
<h1>Reports</h1>
<hr/>
<h2>Member List</h2>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>E-mail</th>
            <th>Roles</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                @if($user->role === 'admin')
                    <td>Admin</td>
                @elseif($user->role === 'doctor')
                    <td>Doctor</td>
                @else
                    <td>Client</td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop