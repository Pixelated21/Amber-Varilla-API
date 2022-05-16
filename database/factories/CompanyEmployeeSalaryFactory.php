<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CompanyEmployee;
use App\Models\CompanyEmployeeSalary;

class CompanyEmployeeSalaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyEmployeeSalary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_employee_id' => CompanyEmployee::factory(),
            'salary' => $this->faker->numberBetween(5000, 100000),
        ];
    }
}
