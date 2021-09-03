<?php

namespace Database\Factories;

use App\Models\Varsity;
use Illuminate\Database\Eloquent\Factories\Factory;

class VarsityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Varsity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name=$this->faker->firstNameMale();
        return [
            'name'=>$name.' University',
            'short_name'=>$name,
            'slug'=>strtolower($name)
        ];
    }
}
