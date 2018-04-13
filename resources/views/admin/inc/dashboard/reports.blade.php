<h1>Reports</h1>
<hr/>
<h2>Member List</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>E-mail</th>
            <th>Roles</th>
        </tr>
        </thead>
        <tbody>
        @php $users = App\User::all()  @endphp
        @for($i = 0; $i < count($users); $i++)
            @php
                $user = $users[$i];
                $role = 'Client';
                if ($user->admin) {
                    $role = 'Admin';
                } else if ($user->doctor) {
                    $role = 'Doctor';
                }
            @endphp
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $role }}</td>
            </tr>
        @endfor
        </tbody>
    </table>
</div>