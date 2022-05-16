<?php

namespace Database\Seeders;

use App\Models\CompanyAdmin;
use App\Models\User;
use Database\Factories\UserDetailFactory;
use Illuminate\Database\Seeder;

class CompanyAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyAdmin::factory()
            ->has(UserDetailFactory::new(), 'userDetail')
            ->count(5)->create();
    }
}
