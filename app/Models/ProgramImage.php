<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramImage extends Model
{
    protected $table = 'program_images';
    protected $guarded = [];
    protected $casts=[
        'images' => 'array'
    ];



    public function program(){
        return $this->belongsTo(Program::class,'images_id');
    }
}
