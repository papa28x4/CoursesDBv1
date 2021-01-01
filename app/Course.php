<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'code', 'title', 'units'
    ];

    public function courses(){
        return $this->belongsToMany(Department::class);
    }
}
