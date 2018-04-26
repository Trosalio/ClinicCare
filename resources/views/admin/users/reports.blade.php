@if($users->isEmpty())
    <h1>No Content Available.</h1>
@else
    <h1>Reports</h1>
    <hr/>
    <h2>Member List</h2>
    <div class="table-responsive">
        <table id="user-table" class="table table-hover">
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
    <div class="text-center">
        <a type="button" class="btn btn-primary" href="{{ route('users.savePDF') }}" target="_blank">Save as PDF</a>
    </div>

    @push('style')
        <style>
            tbody tr:hover {
                color: blue;
                cursor: pointer;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    @endpush
    @push('script')
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#user-table').DataTable();
            });
        </script>
    @endpush
@endif