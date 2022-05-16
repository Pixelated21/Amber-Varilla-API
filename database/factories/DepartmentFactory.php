<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Models\Department;

class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Department::class;

    protected array $companyDepartments = [
        'Marketing Department',
        'Operations Department',
        'Finance Department',
        'Sales Department',
        'Human Resource Department',
        'Purchase Department',
        ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'departmentName' => $this->faker->word,
        ];
    }

    public function persistData(){
        Collection::make($this->companyDepartments)->map(function ($department){
           Department::insert([
              'departmentName' => $department
           ]);
        });
    }
}
