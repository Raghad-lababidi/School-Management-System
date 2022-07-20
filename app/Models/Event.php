<?php

namespace App\Models;

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

    public function schoolClasses()
    {
        return $this->belongsToMany('App\Models\SchoolClass', 'class_event','event_id', 'school_class_id', 'id', 'id');
    }

}
