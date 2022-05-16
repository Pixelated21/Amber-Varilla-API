<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CompanyEmployee;
use App\Models\CompanyEmployeeData;

class CompanyEmployeeDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyEmployeeData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_employee_id' => CompanyEmployee::factory(),
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
        ];
    }
}
