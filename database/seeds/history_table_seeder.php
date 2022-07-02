<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class history_table_seeder extends Seeder
{

    public function run()
    {
        DB::table('history')->delete();

            \App\Models\History::create([
                'name' => 'مدرسة الضياء الاعدادية',
                'manager_name' =>'احمد ابراهيم',
                'manager_email' => 'ahmed@gmail.com',
                'manager_phone' =>'0562586458',
                'history' => '1430',
                'number' =>'45876',
                'grade' =>'المرحلة الاعدادية ',
                'location' =>' الطائف البيعة شارع 15 ',

            ]);

    }
}
