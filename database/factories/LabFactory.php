<?php

namespace Database\Factories;

use App\Models\Lab;
use Illuminate\Database\Eloquent\Factories\Factory;

class LabFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lab::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $lab='lab'.rand(0,900);
        return [
            'name' => $lab,
            'slug' => $lab,
            'course_id'=>rand(1,9)
        ];
    }
}
