<?php

namespace event;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $table = 'events';

    public $timestamps = true;

    protected $fillable = [
        'date', 'title', 'description'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################
    public function class_events()
    {
        return $this->hasMany('Class_event');
    }

}
