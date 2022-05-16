<?php

namespace Database\Factories;

use App\Models\Leave;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CompanyEmployee;
use App\Models\CompanyEmployeeLeave;

class CompanyEmployeeLeaveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyEmployeeLeave::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_employee_id' => CompanyEmployee::factory(),
            'leave_id' => Leave::pluck('id')->random(),
            'startDate' => $this->faker->date(),
            'endDate' => $this->faker->date(),
            'status' => $this->faker->numberBetween(0,2)
        ];
    }
}
