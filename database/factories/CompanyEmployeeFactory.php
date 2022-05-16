<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Company;
use App\Models\CompanyEmployee;
use App\Models\Department;
use App\Models\Position;

class CompanyEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyEmployee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => Company::pluck('id')->random(),
            'dept_id' => Department::pluck('id')->random(),
            'position_id' => Position::pluck('id')->random(),
            'status' => $this->faker->boolean(70),
            'email' => $this->faker->unique()->email,
            'employeeNumber' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'password' => 'password',
        ];
    }
}
