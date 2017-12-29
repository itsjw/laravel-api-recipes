<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChefTest extends TestCase
{
    /**
     * Normal flow of get request to get one chef by id.
     *
     * @return void
     */
    public function testGet()
    {
        $response = $this->get('/api/chefs/1');

        $response->assertStatus(200);
    }

    /**
     * Test getting a non-existant chef
     */
    public function testGetNonExistant()
    {
        $response = $this->get('/api/chefs/111');

        $response->assertSeeText("Chef not Found");

        $response->assertStatus(200);
    }

    /**
     * Test API call to get all chefs
     */
    public function testGetList()
    {
        $response = $this->get('/api/chefs');

        $response->assertStatus(200);
    }

    /**
     * Test API call to create a chef
     */
    public function testPost()
    {
        $faker = \Faker\Factory::create();
        $testName = $faker->word;

        $response = $this->json(
            'POST', 
            '/api/chefs',
            [
                'name' => $testName,
                'city' => $faker->city,
                'available' => 1,
                'contact_info' => $faker->sentence
            ]);


        $response
            ->assertStatus(200)
            ->assertJson([
                'name' => $testName,
            ]);
    }

    /**
     * Test API call to create a chef whose name already exists in our chefs table
     */
    public function testPostDuplicate()
    {
        $faker = \Faker\Factory::create();

        $existingChef = $this->json('GET', '/api/chefs/1')->assertStatus(200)->decodeResponseJson();

        $response = $this->json(
            'POST', 
            '/api/chefs',
            [
                'name' => $existingChef["data"]["name"],
                'description' => $faker->sentence,
                'hours_to_make' => $faker->randomNumber(1)
            ]);

        $response
        ->assertSeeText(sprintf('Chef: %s already exists.', $existingChef["data"]["name"]));
    }
}
