<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassGroup extends Model
{

    protected $table = 'class_group';

    public $timestamps = true;

    protected $fillable = [
        'school_class_id', 'group_id', 'administrator_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################
    public function schedule()
    {
        return $this->hasMany('Schedule');
    }

    public function group()
    {
        return $this->belongsTo('Group');
    }

}
