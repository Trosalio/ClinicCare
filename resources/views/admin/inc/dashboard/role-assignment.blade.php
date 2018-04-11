<?php use App\User; ?>

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
        <?php $users = User::all() ?>
        @for($i = 0; $i < 3; $i++)
            <?php
            $user = $users[$i];
            $roles = array();
            foreach ($user->roles as $role) {
                $roles[] = $role->name;
            }
            ?>
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $user->name }}</td>
                <td>
                    <label class="checkbox-inline"><input type="checkbox"
                                                          value="admin"
                                {{$user->admin ? 'checked' : ''}}>Admin</label>
                    <label class="checkbox-inline"><input type="checkbox"
                                                          value="client"
                                {{$user->client ? 'checked' : ''}}>Client</label>
                    <label class="checkbox-inline"><input type="checkbox"
                                                          value="doctor"
                                {{$user->doctor ? 'checked' : ''}} >Doctor</label>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
</div>
<div class="text-center">
    <button type="button" class="btn btn-primary">Save</button>
    <button type="button" class="btn btn-secondary">Cancel</button>
</div>
