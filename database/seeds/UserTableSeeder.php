<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        $user = \App\User::create([
            'first_name' => 'super',
            'last_name' => 'admin',
            'email' => 'admin@app.com',
            'password' => bcrypt('password'),
        ]);
    }
}
