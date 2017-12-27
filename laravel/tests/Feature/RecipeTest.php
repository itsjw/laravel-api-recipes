<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecipeTest extends TestCase
{
    /**
     * Normal flow of a basic get request.
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
    public function testGetNoRecipe()
    {
        $response = $this->get('/api/recipes/111');

        //I was not sure how to access the specific json message so I used assertSeeText to find my error message
        $response->assertSeeText("Recipe not Found");

        $response->assertStatus(200);
    }
}
