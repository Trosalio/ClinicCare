<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use MaddHatter\LaravelFullcalendar\Event;

class Appointment extends Model implements Event
{
    protected $fillable = [
        'name', 'description', 'start_date', 'end_date'
    ];

    /**
     * Get the event's title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->name;
    }

    /**
     * Is it an all day event?
     *
     * @return bool
     */
    public function isAllDay()
    {
        return (bool)$this->all_day;
    }

    /**
     * Get the start time
     *
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start_date;
    }

    /**
     * Get the end time
     *
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end_date;
    }

    public function client()
    {
        return $this->belongsTo(Models\Client::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Models\Doctor::class);
    }
}
