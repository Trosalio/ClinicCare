
<div class="container">

</div>
<h1>Clinic Care</h1>

<hr/>

<h2>Diagnosis</h2>
<div class="nunu">
  <p>Doctor's Name : {{ Auth::user()->client->firstname }} {{ Auth::user()->client->lastname }}</p>
  <p>Pataint's name : {{ $diagnose->appointment->client->firstname }} {{ $diagnose->appointment->client->lastname }}</p>
  <p>Congenital disease : {{ $diagnose->appointment->client->health_condition ?? 'None.' }}</p>
  <p>Opinion : {{$diagnose->opinion}}</p>
  <p>Date : {{date("d-m-Y", $diagnose->created_at->getTimestamp())}}</p>
  <p>Medicine : {{ $diagnose->medicine }}</p>
</div>
</div>
