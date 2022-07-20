<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceCheck extends Model
{

    protected $table = 'attendance_checks';

    public $timestamps = true;

    protected $fillable = [
        'date', 'type', 'student_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################
    
    public function justification()
    {
        return $this->hasOne(Justification::class);
    }

}
