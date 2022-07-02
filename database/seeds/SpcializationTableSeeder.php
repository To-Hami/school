<?php

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpcializationTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
             'عربي',

        ];
        foreach ($specializations as $S) {
            Specialization::create(['Name' => $S]);
        }
    }
}
