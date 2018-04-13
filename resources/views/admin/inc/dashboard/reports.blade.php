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
        @for($i = 0; $i < count($users); $i++)
            <tr>
                <td>{{ $i+($users->firstItem()) }}</td>
                <td>{{ $users[$i]->username }}</td>
                <td>{{ $users[$i]->email }}</td>
                @if($users[$i]->admin)
                    <td>Admin</td>
                @elseif($users[$i]->doctor)
                    <td>Doctor</td>
                @else
                    <td>Client</td>
                @endif
            </tr>
        @endfor
        </tbody>
    </table>
</div>
{{ $users->links() }}
<div class="text-center">
    <button type="button" class="btn btn-primary">Save as PDF</button>
</div>