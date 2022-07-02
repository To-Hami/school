<?php

namespace App\Models;

use App\Models\Grades\Grade;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    protected $table = 'specializations';

    protected $fillable = ['name', 'grade_id', 'classroom_id', 'teacher_id'];


    // جلب اسم المراحل الدراسية

    public function grade()
    {
        return $this->belongsTo(   Grade::class, 'grade_id');
    }

    // جلب اسم الصفوف الدراسية
    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }

    // جلب اسم المعلم
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }


}
