<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Movies::create([
            'name_movie'  => 'Judul Movie'.str_random(10),
            'desc' => 'berikut adalah penjelasan riview sebuah film berjudul'.str_random(7),
            'image'=> '366299218.JPG'
        ]);
    }
}
