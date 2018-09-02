<?php

use Illuminate\Database\Seeder;
use App\Act;

class ActTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Let's truncate our existing records to start from scratch.
        Act::truncate();

        $faker = \Faker\Factory::create();
        // Let's truncate our existing records to start from scratch.
        Act::truncate();
        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 7; $i++) {
            Act::create([
                'content' => $faker->sentence,
                'narrative_id' => 1,
                'user_id' => 1,
            ]);
        }
    }
}
