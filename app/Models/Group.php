<?php

namespace Group;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $table = 'groups';

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

}
