<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $guarded = [ ];



    public  function images (){
        return $this->hasMany(ProgramImage::class,'images_id' );
    }
}
