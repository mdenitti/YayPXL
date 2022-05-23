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
}
