<?php

namespace Database\Seeders;

use App\Models\CompanyRole;
use Illuminate\Database\Seeder;

class CompanyRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyRole::factory()->persistData();
    }
}
