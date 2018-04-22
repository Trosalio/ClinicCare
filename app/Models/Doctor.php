<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use App\User;

class Doctor extends Model
{
    use Notifiable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
