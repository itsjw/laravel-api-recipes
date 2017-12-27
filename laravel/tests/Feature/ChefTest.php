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
}
