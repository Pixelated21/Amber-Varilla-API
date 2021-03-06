<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CompanyAdmin;

class CompanyAdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyAdmin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->safeEmail,
            'email_verified_at' => $this->faker->dateTime(),
            'password' => 'password',
            'remember_token' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'status' => $this->faker->numberBetween(-10000, 10000),
            'uuid' => $this->faker->uuid,
        ];
    }
}
