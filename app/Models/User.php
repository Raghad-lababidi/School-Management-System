<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    public $timestamps = true;

    protected $fillable = [
        'first_name', 'last_name', /*'user_name', 'email'*/
    ];

    protected $hidden = [
        /*'password',*/ 'created_at', 'updated_at', 'remember_token',
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

    public function administrator()
    {
        return $this -> hasOne('App\Models\Administrator', 'user_id', 'id');
    }

    public function student()
    {
        return $this -> hasOne('App\Models\Student', 'user_id', 'id');
    }

    public function complaints_receivers()
    {
        return $this->hasMany('Complaint_Receiver');
    }

    public function complaints()
    {
        return $this->hasMany('Complaint');
    }
}
