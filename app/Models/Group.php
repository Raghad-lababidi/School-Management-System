<?php

namespace App\Models;

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
        return $this->hasMany(ClassGroup::class);
    }

    public function schoolClasses()
    {
        return $this->belongsToMany('App\Models\SchoolClass', 'class_group','group_id', 'school_class_id', 'id', 'id');
    }



}
