<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            'name' => 'Spaghetti Bolognese',
            'description' => 'A classic meal of spaghettin and meat sauce',
            'hours_to_make' => 2,
            'created_at' => '2017-07-07 17:17:17',
            'updated_at' => '2017-07-07 17:17:17'
        ]);
    }
}
