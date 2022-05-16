<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CompanyEmployee;
use App\Models\CompanyEmployeeAssignedRole;
use App\Models\CompanyRole;

class CompanyEmployeeAssignedRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyEmployeeAssignedRole::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_employee_id' => CompanyEmployee::factory(),
            'company_roles_id' => CompanyRole::pluck('id')->random(),
        ];
    }
}
