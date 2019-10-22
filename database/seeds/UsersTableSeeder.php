<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'  => 'admin_'.str_random(2),
            'email' => 'admin_'.str_random(2) . '@gmail.com',
            'password'  => bcrypt('password')
        ]);
    }
}
