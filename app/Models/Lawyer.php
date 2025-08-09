<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    protected $fillable = [
        'first_name','last_name','title','bio','photo','email','phone',
        'education','experience','languages','status',
    ];

    protected $casts = [
        'education' => 'array',
        'experience' => 'array',
        'languages' => 'array',
        'status' => 'boolean',
    ];

    public function practices() {
        return $this->belongsToMany(Practice::class);
    }

    public function getFullNameAttribute(): string {
        return trim($this->first_name.' '.$this->last_name);
    }
}