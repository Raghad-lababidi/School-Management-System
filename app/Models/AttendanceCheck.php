<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceCheck extends Model
{

    protected $table = 'attendances_check';

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
