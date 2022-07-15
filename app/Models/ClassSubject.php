<?php

namespace ClassSubject;

use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{

    protected $table = 'class_subject';

    public $timestamps = true;

    protected $fillable = [
       'class_id', 'subject_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################
    public function educational_content()
    {
        return $this->hasMany('Educational_content');
    }

}
