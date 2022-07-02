<?php

namespace App\Models\Grades;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasTranslations;

    protected $fillable =['Name','Notes'];

    public $timestamps = true;
    public  $translatable = ['name'];
    public function Sections()
    {
        return $this->hasMany('App\Models\Section', 'Grade_id');
    }
}
