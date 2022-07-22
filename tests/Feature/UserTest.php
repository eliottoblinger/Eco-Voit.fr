<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGoToLoginPage()
    {
        $response = $this->get('/login');

        if(Auth::check()){
            $response->assertStatus(302);
        }else{
            $response->assertStatus(200);
        }
    }

    public function testGoToAccountPage()
    {
        $response = $this->get('/account');

        if(Auth::check()){
            $response->assertStatus(200);
        }else{
            $response->assertStatus(302);
        }
    }

    public function testGoToLogoutPage()
    {
        $response = $this->get('/logout');

        if(Auth::check()){
            $response->assertStatus(200);
        }else{
            $response->assertStatus(302);
        }
    }
}
