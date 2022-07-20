<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{

    protected $table = 'complaints';

    public $timestamps = true;

    protected $fillable = [
        'title', 'text', 'date', 'sender_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    ##############################Relationships##############################

    public function receiver()
    {
        return $this -> hasOne(ComplaintReceiver::class);
    }
}
