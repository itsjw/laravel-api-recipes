<?php

use Illuminate\Database\Seeder;
use App\Recipe;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        Recipe::create([
            'name' => 'Risotto',
            'description' => 'Italian rice with creamy mushroom and white win sauce.',
            'hours_to_make' => 2
        ]);

        Recipe::create([
            'name' => 'Fried rice',
            'description' => 'Rice with stir-fried vegetables in soy sauce and more.',
            'hours_to_make' => 2
        ]);

        Recipe::create([
            'name' => 'Dahl (Lentils)',
            'description' => 'Indian spiced soup made with lentils.',
            'hours_to_make' => 5
        ]);

        //Create 5 random recipes
        for ($i = 0; $i < 5; $i++) {
            Recipe::create([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'hours_to_make' => $faker->randomNumber(1)
            ]);
        }
    }
}
