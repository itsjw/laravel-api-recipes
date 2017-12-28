<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecipeTest extends TestCase
{    
    /**
     * Normal flow of get request to get one recipe by id.
     *
     * @return void
     */
    public function testGet()
    {
        $response = $this->get('/api/recipes/1');

        $response->assertStatus(200);
    }

    /**
     * Test getting a non-existant recipe
     */
    public function testGetNonExistant()
    {
        $response = $this->get('/api/recipes/111');

        //I was not sure how to access the specific json message so I used assertSeeText to find my error message
        $response->assertSeeText("Recipe not Found");

        $response->assertStatus(200);
    }

    /**
     * Test API call to get all recipes
     */
    public function testGetList()
    {
        $response = $this->get('/api/recipes');

        $response->assertStatus(200);
    }

    /**
     * Test API call to create a recipe
     */
    public function testPost()
    {
        $faker = \Faker\Factory::create();
        $testName = $faker->word;

        $response = $this->json(
            'POST', 
            '/api/recipes',
            [
                'name' => $testName,
                'description' => $faker->sentence,
                'hours_to_make' => $faker->randomNumber(1)
            ]);


        $response
            ->assertStatus(200)
            ->assertJson([
                'name' => $testName,
            ]);
    }
}
