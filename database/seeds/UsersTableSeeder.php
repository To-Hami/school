<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $user = \App\User::create([
            'first_name' => 'super',
            'last_name' => 'admin',
            'email' => 'admin@app.com',
            'password' => bcrypt('password'),
        ]);
        $user->attachRole('super_admin');

    }
}
