<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        foreach (range(1, 10) as $_) {
            $fullName = $faker->firstName . ' ' . $faker->lastName;
            DB::table('students')->insert([
                'full_name' => $fullName,


            ]);
        }
    }
}
