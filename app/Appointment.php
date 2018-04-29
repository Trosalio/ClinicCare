<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function client()
    {
        return $this->belongsTo(Models\Client::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Models\Doctor::class);
    }
}
