<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Student extends Authenticatable  implements JWTSubject
{
    protected $guard = 'student-api';

    protected $table = 'students';

    public $timestamps = true;

    protected $fillable = [
        'father_name', 'mother_name', 'phone', 'user_name', 'user_id', 'class_group_id'
    ];

    protected $hidden = [
        'password', 'created_at', 'updated_at'
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    ##############################Relationships##############################
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

    public function attendances()
    {
        return $this->hasMany(AttendanceCheck::class);
    }

    public function classGroup()
    {
        return $this->belongsTo('App\Models\ClassGroup', 'class_group_id', 'id');
    }

}
