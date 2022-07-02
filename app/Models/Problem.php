<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $guarded = [];

    public function students()
    {
        return $this->belongsToMany('App\Models\Student','student_problems');
    }
}
