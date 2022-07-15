<?php

namespace SchoolClass;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{

    protected $table = 'classes';

    public $timestamps = true;

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################
    public function class_group()
    {
        return $this->hasMany('Class_Group');
    }

    public function class_subject()
    {
        return $this->hasMany('Class_subject');
    }

    public function class_events()
    {
        return $this->hasMany('Class_event');
    }

}
