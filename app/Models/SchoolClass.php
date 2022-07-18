<?php

namespace App\Models;

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
        return $this->hasMany(ClassGroup::class);
    }

    public function class_subject()
    {
        return $this->hasMany(ClassSubject::class);
    }

    public function class_events()
    {
        return $this->hasMany(ClassEvent::class);
    }

}
