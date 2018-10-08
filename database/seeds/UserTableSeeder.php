<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
        User::truncate();

        $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and 
        // let's hash it before the loop, or else our seeder 
        // will be too slow.

        User::create([
            'name' => 'Master',
            'email' => 'bruno@gmail.com',
            'password' => Hash::make('master'),
            'folder' => 'uploads/user/profile/',
            'picture' => 'user.png',
            'alias' => 'The Master',
            'status' => 1,
        ]);

        User::create([
            'name' => 'Teste',
            'email' => 'teste@gmail.com',
            'password' => Hash::make('teste'),
            'folder' => 'uploads/user/profile/',
            'picture' => 'user.png',
            'alias' => 'The Tester',
            'status' => 1,
        ]);

        // And now let's generate a few dozen users for our app:
        // for ($i = 0; $i < 1; $i++) {
        //     User::create([
        //         'name' => $faker->name,
        //         'email' => $faker->email,
        //         'password' => $password,
        //         'folder' => 'uploads/user/profile/',
        //         'picture' => 'user.png',
        //         'alias' => $faker->name,
        //         'status' => 1,
        //     ]);
        // }
    }
}
