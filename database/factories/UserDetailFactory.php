<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\UserDetail;

class UserDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genders = ['Female','Male'];
        return [
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'sex' => \Arr::random($genders),
            'birthDate' => $this->faker->date(),
        ];
    }
}
