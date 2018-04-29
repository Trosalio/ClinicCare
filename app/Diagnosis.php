<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Models\Client' ,'client_id');
    }
    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor' ,'doctor_id');
    }
}
