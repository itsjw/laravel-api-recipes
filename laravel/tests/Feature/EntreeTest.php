<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntreeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    //When test database implemented will run this test.
    // /**
    //  * Test API call to create an entree
    //  */
    // public function testPost()
    // {
    //     $faker = \Faker\Factory::create();
    //     $testName = $faker->word;

    //     $response = $this->json(
    //         'POST', 
    //         '/api/entrees',
    //         [
    //             'recipe_id' => 4,
    //             'chef_id' => 1,
    //             'about' => $faker->sentence
    //         ]);


    //     $response
    //         ->assertStatus(200)
    //         ->assertJson([
    //             'name' => $testName,
    //         ]);
    // }
}
