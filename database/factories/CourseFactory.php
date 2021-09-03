<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name=$this->faker->firstNameFemale();
        $code=$name.$this->faker->numberBetween($min = 100, $max = 500);
        return [
            'name'=>$name,
            'course_code'=>$code,
            'slug'=>$code,
        ];
    }
}
