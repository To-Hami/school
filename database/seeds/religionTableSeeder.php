<?php

use App\Models\Religion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class religionTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('religions')->delete();

        $religions = [ 'مسلم','مسيحي','غير ذلك'  ];

        foreach ($religions as $R) {
            Religion::create(['Name' => $R]);
        }
    }
}
