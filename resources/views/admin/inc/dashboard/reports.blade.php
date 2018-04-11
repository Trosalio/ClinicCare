<?php use App\User; ?>

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
        <?php $users = User::all() ?>
        @for($i = 0; $i < 3; $i++)
            <?php
            $user = $users[$i];
            $roles = array();
            foreach($user->roles as $role){
                $roles[] = $role->name;
            }
            ?>
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ implode(', ', $roles)}}</td>
            </tr>
        @endfor
        </tbody>
    </table>
</div>