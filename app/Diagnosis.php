<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $fillable = [
      'opinion', 'medicine'
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }

    public function client()
    {
        return $this->belongsTo(Models\Client::class, 'client_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Models\Doctor::class, 'doctor_id');
    }
}
