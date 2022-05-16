<?php

namespace Database\Seeders;

use App\Models\CompanyEmployee;
use Database\Factories\CompanyEmployeeAssignedRoleFactory;
use Database\Factories\CompanyEmployeeDataFactory;
use Database\Factories\CompanyEmployeeFactory;
use Database\Factories\CompanyEmployeeLeaveFactory;
use Database\Factories\CompanyEmployeeSalaryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyEmployee::factory()
            ->has(CompanyEmployeeDataFactory::new())
            ->has(CompanyEmployeeSalaryFactory::new())
            ->has(CompanyEmployeeAssignedRoleFactory::new())
            ->has(CompanyEmployeeLeaveFactory::new()->count(3))
            ->count(10)->create();
    }
}
