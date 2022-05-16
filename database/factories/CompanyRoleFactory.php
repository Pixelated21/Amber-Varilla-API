<?php

namespace Database\Factories;

use App\Models\CompanyRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

class CompanyRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyRole::class;

    protected $companyRoles = [
        'HR',
        'Employee'
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'companyRoleName' => $this->faker->word,
        ];
    }

    public function persistData()
    {
        Collection::make($this->companyRoles)->map(function ($companyRole) {
            CompanyRole::insert(['companyRoleName' => $companyRole]);
        });
    }
}
