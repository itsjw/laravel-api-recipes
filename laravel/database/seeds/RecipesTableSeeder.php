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

        //Create 5 recipes
        for ($i = 0; $i < 5; $i++) {
            Recipe::create([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'hours_to_make' => $faker->randomNumber(5)
            ]);
        }
    }
}
