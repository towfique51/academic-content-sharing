<?php

namespace Database\Seeders;

use App\Models\Lab;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = Post::factory()->count(3)->for(
            Lab::factory(), 'postable'
        )->create();
    }
}
