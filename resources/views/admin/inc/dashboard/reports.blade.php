<h1>Reports</h1>
<hr/>
<h2>Member List</h2>
<div class="table-responsive">
    <table class="table table-hover">
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
            <tr onclick="window.location.assign('{{ route('users.show', [$user]) }}')">
                <td>{{ $loop->index +($users->firstItem()) }}</td>
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
{{ $users->links() }}
<div class="text-center">
    <button type="button" class="btn btn-primary">Save as PDF</button>
</div>

@push('style')
    <style>
        tbody tr:hover {
            color: blue;
            cursor: pointer;
        }
    </style>
@endpush