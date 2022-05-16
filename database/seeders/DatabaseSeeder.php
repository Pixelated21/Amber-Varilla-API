<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Position;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            DepartmentSeeder::class,
            PositionSeeder::class,
            LeaveSeeder::class,
            CompanyRoleSeeder::class,
            UserSeeder::class,
            CompanyAdminSeeder::class,
            CompanySeeder::class,
            EmployeeSeeder::class,
            JobSeeder::class,
        ]);
    }
}
