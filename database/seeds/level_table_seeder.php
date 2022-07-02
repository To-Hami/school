<?php

use App\Models\Level;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class level_table_seeder extends Seeder
{

    public function run()
    {
        DB::table('levels')->delete();
        $levels = [
         ' مبتدئ بدون تقيم'  ,' كثير الغياب' ,' متدني المستوي' ,'متوسط المستوي','متفوق'
        ];
        foreach ($levels as $level){
            Level::create([
                'name' => $level,
            ]);
        }
    }
}
