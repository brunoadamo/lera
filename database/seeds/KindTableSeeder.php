<?php

use App\Kind;
use Illuminate\Database\Seeder;

class KindTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kind::create([
            'title' => 'Terror',
        ]);
        Kind::create([
            'title' => 'Aventura',
        ]);
        Kind::create([
            'title' => 'Romance',
        ]);
    }
}
