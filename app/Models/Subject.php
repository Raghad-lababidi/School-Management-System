<?php

namespace subject;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    protected $table = 'subjects';

    public $timestamps = true;

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################
    public function class_subject()
    {
        return $this->hasMany('Class_subject');
    }

    public function marks()
    {
        return $this->hasMany('Mark');
    }

}
