<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use App\Models\Varsity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModelTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /**
     * @test
     */
    public function create_user_test()
    {
        $this->withoutExceptionHandling();
        $user = User::factory(1)->create();
        $this->assertEquals(User::all()->count(), 1, 'Match');
    }

    

    /**
     * @test
     */
    public function create_Varsity_test()
    {
        $this->withoutExceptionHandling();
        $varsity = Varsity::factory(1)->create();
        $this->assertEquals(Varsity::all()->count(), 1, 'Match');
    }

    public function blog_post_test()
    {
        $this->withoutExceptionHandling();
        $posts = Post::factory()
            ->count(3)
            ->create();
        $this->assertEquals(Post::all()->count(), 3, 'Match');
    }
}
