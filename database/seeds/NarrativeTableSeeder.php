<?php

use Illuminate\Database\Seeder;

use App\Narrative;

class NarrativeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Narrative::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 7; $i++) {
            Narrative::create([
                'title' => $faker->sentence,
                'theme' => $faker->sentence,
                'kind_id' => 1,
                'act_n' => 3,
                'clue' => $faker->sentence,
                'content' => $faker->paragraph,
                'folder' => 'uploads/narrative/cover/',
                'picture' => 'example.jpg',
                'user_id' => 1,
                'status' => 1,
            ]);
        }
    }
}