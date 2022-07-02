<?php

use App\Models\Problem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Problems_table_seeder extends Seeder
{

    public function run()
    {
        {
            DB::table('problems')->delete();
            $problems = [
                'تدخين',
                'سوء سلوك',
                ' عنف',
                'تنمر',
                'غياب',
                'تدني في المستوي',
                ' موقف متكرر بشكل يومي',
                'مشاكل صحية',
                'مشاكل أسرية ',
                'مشاكل نفسية',

            ];
            foreach ($problems as $problem) {
              Problem::create(['Name' => $problem]);
            }
        }
    }
}
