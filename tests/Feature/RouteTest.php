<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class RouteTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function home_route_is_working()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /** @test */
    public function post_route_is_working()
    {
        $response = $this->get('/post');

        $response->assertStatus(200);
    }
    /** @test */
    public function login_route_is_working()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    /** @test */
    public function register_route_is_working()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /** @test */
    public function incorrect_page_is_workign()
    {
        $response = $this->get('/fsdfdsdfg');
        $response->assertStatus(404);
    }

    /** @test */
    public function only_login_user_access_this_route()
    {

        $response = $this->get('/panel')->assertRedirect('/login');
    }
    public function only_admin_can_access_this_route()
    {
        $this->withoutExceptionHandling();
        $user = User::create([
            'name' => 'Zenith Jhony',
            'email' => 'zenithzonezj@gmail.com',
            'password' => '123456789'
        ]);
        
        $user->profile()->save();
        $response = $this->actingAs($user)->get('/panel')
            ->assertOk();
    }
}