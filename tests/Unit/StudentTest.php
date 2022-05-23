<?php

namespace Tests\Unit;

use Tests\TestCase;

class StudentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_contact_route()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }

    public function test_contact_content()
    {
        $response = $this->get('/contact');
        $response->assertSee('volledige');
        
    }

    public function test_security() {
        // Check if route viewable without login - 303 redirect alles na /admin route 
        $response = $this->get('/students');
        $response->assertStatus(302);
        }


    
}
