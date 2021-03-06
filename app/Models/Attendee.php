<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'uid', 'email', 'phone', 'event_id', 'city', 
        'invitation_code', 'gender', 'checked_in_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'checked_in_at' => 'datetime',
    ];

    // Mutators
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst($value);
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucfirst($value);
    }

    //Accessors
    public function getFullnameAttribute()
    {
        return $this->last_name . ', ' . $this->first_name;
    }

    // Relationships
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'uid')->withDefault();
    }
}
