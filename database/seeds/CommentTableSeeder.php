<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Comment::truncate();

        $faker = \Faker\Factory::create();


        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 20; $i++) {
            Comment::create([
                'content' => $faker->sentence,
                'narrative_id' => 1,
                'user_id' => 1,
                'status' => 1,
            ]);
        }
    }
}
