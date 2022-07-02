<?php

use App\Models\Nationalitie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalitiesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('nationalities')->delete();

        $nationals = [ 'سعودي','مصري','يمني','برماوي'];

        foreach ($nationals as $n) {
            Nationalitie::create(['Name' => $n]);
        }

    }
}
