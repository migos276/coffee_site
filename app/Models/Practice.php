<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    protected $fillable = [
        'name','short_description','full_description','icon','order','meta_title','meta_description'
    ];

    public function lawyers() {
        return $this->belongsToMany(Lawyer::class);
    }
}