@extends('layouts.pdf')

@section('content')
<h1>Appointment - {{ $app->id }}</h1>
<hr/>
<h2>Client Info</h2>
<table style="width: 100%">
    <tr>
        <th>First Name:</th>
        <td>{{$app->client->firstname}}</td>
    </tr>
    <tr>
        <th>Last Name:</th>
        <td>{{$app->client->lastname}}</td>
    </tr>
    <tr>
        <th>Citizen No.:</th>
        <td>{{$app->client->id_no}}</td>
    </tr>
    <tr>
        <th>Tel. No.:</th>
        <td>{{$app->client->tel_no}}</td>
    </tr>
    <tr>
        <th>Gender:</th>
        @if ($app->client->gender == 'm')
            <td>Male</td>
        @elseif ($app->client->gender == 'f')
            <td>Female</td>
        @endif
    </tr>
    <tr>
        <th>Weight:</th>
        <td>{{$app->client->weight}}</td>
    </tr>
    <tr>
        <th>Height:</th>
        <td>{{$app->client->height}}</td>
    </tr>
    <tr>
        <th>Blood Type:</th>
        <td>{{$app->client->blood_type}}</td>
    </tr>
    <tr>
        <th>Intolerances:</th>
        @if ($app->client->intolerances == null)
            <td>-</td>
        @else
            <td>{{$app->client->intolerances}}</td>
        @endif
    </tr>
    <tr>
        <th>Health Condition:</th>
        @if ($app->client->health_conditions == null)
            <td>-</td>
        @else
            <td>{{$app->client->health_conditions}}</td>
        @endif
    </tr>
</table>
<hr/>
<h2>Reservation Request</h2>
<table style="width: 100%">
    <tr>
        <th>Title:</th>
        <td>{{$app->name}}</td>
    </tr>
    <tr>
        <th>Description:</th>
        <td>{{$app->description}}</td>
    </tr>
    <tr>
        <th>Start:</th>
        <td>{{$app->start_date}}</td>
    </tr>
    <tr>
        <th>End:</th>
        <td>{{$app->end_date}}</td>
    </tr>
    <tr>
        <th>Doctor:</th>
        <td>{{$app->doctor->user->client->firstname}} {{$app->doctor->user->client->lastname}}</td>
    </tr>
    <tr>
        <th>Status:</th>
        @if ($app->status == 0)
            <td>Pending</td>
        @elseif ($app->status == 1)
            <td>Accepted</td>
        @elseif ($app->status == 2)
            <td>Declined</td>
        @endif
    </tr>
</table>
@stop