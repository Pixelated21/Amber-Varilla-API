<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => $this->faker->dateTime(),
            'password' => 'password',
            'remember_token' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'status' => $this->faker->numberBetween(1, 3),
            'uuid' => $this->faker->uuid,
        ];

    }
}
