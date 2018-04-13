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
        @for($i = 0; $i < count($users); $i++)
            <tr>
                <td>{{ $i+($users->firstItem()) }}</td>
                <td>{{$users[$i]->username }}</td>
                <td>
                    @if($users[$i]->admin)
                        Admin
                    @else
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="{{ $users[$i]->username.'-as-client'
                             }}"
                                   name="{{'radio-group-of-'.$users[$i]->username }}"
                                   class="custom-control-input" {{$users[$i]->client ?
                                   $users[$i]->doctor ? '' : 'checked' : ''}}>
                            <label class="custom-control-label"
                                   for="{{ $users[$i]->username.'-as-client' }}"
                            >Client</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="{{ $users[$i]->username.'-as-doctor'
                             }}"
                                   name="{{'radio-group-of-'.$users[$i]->username }}"
                                   class="custom-control-input" {{$users[$i]->doctor ?
                                   'checked' : ''}}>
                            <label class="custom-control-label"
                                   for="{{ $users[$i]->username.'-as-doctor' }}"
                            >Doctor</label>
                        </div>
                    @endif
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
</div>
{{ $users->links() }}
<div class="text-center">
    <button type="button" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-secondary">Cancel</button>
</div>
