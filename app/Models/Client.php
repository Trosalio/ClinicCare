<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use App\User;

class Client extends Model
{
    use Notifiable;

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}