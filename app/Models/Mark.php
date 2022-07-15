<?php

namespace mark;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{

    protected $table = 'marks';

    public $timestamps = true;

    protected $fillable = [
        'type', 'semester', 'subject_id', 'student_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################

}
