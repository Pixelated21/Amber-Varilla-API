<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Company;
use App\Models\CompanyDetail;

class CompanyDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => Company::factory(),
            'companyEmail' => $this->faker->email,
            'companyWebsite' => $this->faker->url,
            'companyAddress' => $this->faker->address,
            'companyCountry' => $this->faker->country,
            'companyContact' => $this->faker->phoneNumber,
        ];
    }
}
