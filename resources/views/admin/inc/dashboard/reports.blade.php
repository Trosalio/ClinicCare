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
        @foreach($users as $index=>$user)
            <tr>
                <td>{{ $index+($users->firstItem()) }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                @if($user->admin)
                    <td>Admin</td>
                @elseif($user->doctor)
                    <td>Doctor</td>
                @else
                    <td>Client</td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{ $users->links() }}
<div class="text-center">
    <button type="button" class="btn btn-primary">Save as PDF</button>
</div>