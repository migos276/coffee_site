<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['name','email','phone','preferred_date','subject','message','status'];

    protected $casts = [
        'preferred_date' => 'datetime',
    ];
}