<?php

namespace Database\Factories;

use App\Models\Lab;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */



    // $body=;
    // return [
    //     
    //     
    //     'body' => $body,
    //     'description' => $this->faker->text($maxNbChars = 500),
    //     'metadescription' => $this->faker->text($maxNbChars = 155),
    //     'category_id' => $this->faker->numberBetween($min = 1, $max = 5),
    //     'profile_user_id' => 1,
    // ];
    public function definition(){
        $postable = $this->postable();

        return [
            'title' => $this->faker->name,
            'slug' => $this->faker->unique()->slug,
            'metadescription' => $this->faker->text($maxNbChars = 155),
            'metatag' => $this->faker->text($maxNbChars = 155),
            'body' => '<p class="card-text mt-2">'.$this->faker->sentence($nbWords = 50, $variableNbWords = true).'</p>'.'<p>&nbsp;</p><p class="card-text mt-2">'.$this->faker->sentence($nbWords = 50, $variableNbWords = true).'</p>',
            'user_id' => 1,
            'postable_id' => $postable::factory(),
            'postable_type' => $postable,
            
        ];
    }

    public function postable()
    {
        return $this->faker->randomElement([
            Lab::class,
        ]);
    }
}
