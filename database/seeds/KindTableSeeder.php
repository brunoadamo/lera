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
        $kinds = [
            ['title' => 'Aventura'],
            ['title' => 'Comédia'],
            ['title' => 'Comédia romântica'],
            ['title' => 'Comédia dramática'],
            ['title' => 'Comédia de ação'],
            ['title' => 'Cult'],
            ['title' => 'Drama'],
            ['title' => 'Espionagem'],
            ['title' => 'Fantasia'],
            ['title' => 'Faroeste (ou western)'],
            ['title' => 'Ficção científica'],
            ['title' => 'Franchise/Séries'],
            ['title' => 'Guerra'],
            ['title' => 'Policial'],
            ['title' => 'Romance'],
            ['title' => 'Suspense'],
            ['title' => 'Terror (ou horror)'],
        ];

        foreach($kinds as $kind){
            Kind::create($kind);
        }
    }
}
