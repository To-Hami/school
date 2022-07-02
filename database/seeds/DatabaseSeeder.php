<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(BloodTableSeeder::class);
         $this->call(NationalitiesTableSeeder::class);
         $this->call(religionTableSeeder::class);
         $this->call(GenderTableSeeder::class);
         $this->call(SpcializationTableSeeder::class);
         $this->call(Grade_table_seeder::class);
         $this->call(Problems_table_seeder::class);
         $this->call(level_table_seeder::class);
         $this->call(years_table_seeder::class);
         $this->call(history_table_seeder::class);
    }
}
