<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use WithoutMiddleware;

    public function testHomePage()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function testDashboard()
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(200);
    }

    public function testLogin()
    {
        $data = [
            'email' => 'alen@annovation.hr',
            'password' => 'a801809f',
            '_token' => csrf_token()
        ];

        $response = $this->post('/login', $data);

        $response->assertStatus(302);
    }


}
