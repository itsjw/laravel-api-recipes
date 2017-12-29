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
        $response = $this->json('GET', '/api/recipes/1');

        $response->assertStatus(200);
    }

    /**
     * Test getting a non-existant recipe
     */
    public function testGetNonExistant()
    {
        $response = $this->json('GET', '/api/recipes/1111');

        //I was not sure how to access the specific json message so I used assertSeeText to find my error message
        $response->assertSeeText("Recipe not Found");

        $response->assertStatus(200);
    }

    /**
     * Test API call to get all recipes
     */
    public function testGetList()
    {
        $response = $this->json('GET', '/api/recipes');

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

    /**
     * Test API call to create a recipe whose name already exists in our recipes table
     */
    public function testPostDuplicate()
    {
        $faker = \Faker\Factory::create();

        $existingRecipe = $this->json('GET', '/api/recipes/1')->assertStatus(200)->decodeResponseJson();

        $response = $this->json(
            'POST', 
            '/api/recipes',
            [
                'name' => $existingRecipe["data"]["name"],
                'description' => $faker->sentence,
                'hours_to_make' => $faker->randomNumber(1)
            ]);

        $response
        ->assertSeeText(sprintf('Recipe: %s already exists.', $existingRecipe["data"]["name"]));
    }

    /**
     * Test API call to update a recipe
     */
    public function testPut()
    {
        $faker = \Faker\Factory::create();
        $testName = $faker->word;
        $existingRecipe = $this->json('GET', '/api/recipes/4')->assertStatus(200)->decodeResponseJson();

        $response = $this->json(
            'PUT', 
            '/api/recipes/4',
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

    /**
     * Test API call to update a non-existant recipe
     */
    public function testPutNonExistant()
    {
        $faker = \Faker\Factory::create();

        $response = $this->json(
            'PUT', 
            '/api/recipes/1111',
            [
                'name' => $faker->word,
                'description' => $faker->sentence,
                'hours_to_make' => $faker->randomNumber(1)
            ]);


        $response
            ->assertStatus(200)
            ->assertSeeText('Recipe not found');
    }
}
