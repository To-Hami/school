<?php

use App\Models\Grades\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Grade_table_seeder extends Seeder
{

    public function run()
    {
        DB::table('grades')->delete();
        $grades = [
            'المرحلة الابتدائية'
            ,'المرحلة الاعدادية',
            'المرحلة الثانوية'  ];
        foreach ($grades as $grade){
            Grade::create([
                'Name' => $grade,
            ]);
        }
    }
}
