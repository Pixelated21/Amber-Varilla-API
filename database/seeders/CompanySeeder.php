<?php

namespace Database\Seeders;

use App\Models\Company;
use Database\Factories\CompanyDetailFactory;
use Database\Factories\CompanyNoticeFactory;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory()
            ->has(CompanyDetailFactory::new())
            ->has(CompanyNoticeFactory::new())
            ->count(5)->create();
    }
}
