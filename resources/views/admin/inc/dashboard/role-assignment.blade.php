<h1>Role Assignment</h1>
<hr/>
<h2>Member List</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Assigned Role(s)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $index=>$user)
            <tr>
                <td>{{ $index+($users->firstItem()) }}</td>
                <td>{{ $user->username }}</td>
                <td>
                    @if($user->admin)
                        Admin
                    @else
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio"
                                   id="{{ $user->username.'-as-client' }}"
                                   name="{{'radio-group-of-'.$user->username }}"
                                   class="custom-control-input" {{
                                   $user->client ?
                                   $user->doctor ? '' : 'checked' : ''}}>
                            <label class="custom-control-label"
                                   for="{{ $user->username.'-as-client' }}"
                            >Client</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio"
                                   id="{{ $user->username.'-as-doctor' }}"
                                   name="{{'radio-group-of-'.$user->username }}"
                                   class="custom-control-input" {{
                                   $user->doctor ? 'checked' : '' }}>
                            <label class="custom-control-label"
                                   for="{{ $user->username.'-as-doctor' }}"
                            >Doctor</label>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{ $users->links() }}
<div class="text-center">
    <button type="button" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-secondary">Cancel</button>
</div>
