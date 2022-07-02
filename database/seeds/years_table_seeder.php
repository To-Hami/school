<?php

use App\Models\Year;
use Illuminate\Database\Seeder;

class years_table_seeder extends Seeder
{

    public function run()
    {
        $years = [
            '1442', '1443',
            '1444', '1445',
            '1446', '1447',
            '1448', '1449',

        ];
        foreach ($years as $year) {
            Year::create(['name' => $year]);
        }
    }
}
