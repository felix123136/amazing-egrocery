<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $genders = ['Male', 'Female'];

        foreach ($genders as $gender) {
            DB::table('genders')->insert([
                'description' => $gender
            ]);
        }

        $roles = ['Admin', 'User'];
        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role
            ]);
        }

        \App\Models\User::factory(10)->create();

        for ($i = 1; $i <= 25; $i++) {
            DB::table('items')->insert([
                'name' => 'Vegetable ' . $i,
                'picture' => 'https://img.freepik.com/premium-vector/fresh-vegetables_267448-99.jpg?w=2000',
                'price' => $i * 10000,
                'description' => 'Introducing the "Wackadoo Squash", a zany and quirky vegetable that\'s sure to bring some fun to your next meal! This unique vegetable resembles a regular squash, but with wild and wacky shapes that make it stand out from the crowd. Its vibrant green and orange exterior adds a pop of color to your plate, while its sweet and nutty flavor will leave you wanting more. Whether you\'re roasting, grilling, or pureeing, the Wackadoo Squash is sure to add some excitement to your culinary creations. Get ready to be a hit at your next dinner party with the Wackadoo Squash!',
            ]);
        }
    }
}
