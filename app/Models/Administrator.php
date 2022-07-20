<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Administrator extends Authenticatable  implements JWTSubject
{

    protected $table = 'administrators';

    public $timestamps = true;

    protected $fillable = [
        'user_name', 'age', 'certification', 'user_id'
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

    public function classGroup()
    {
        return $this->belongsTo('App\Models\ClassGroup', 'class_group_id', 'id');
    }

}
