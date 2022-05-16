<?php

namespace Database\Seeders;

use App\Models\Job;
use Database\Factories\JobApplicationDataFactory;
use Database\Factories\JobApplicationFactory;
use Database\Factories\JobDetailFactory;
use Database\Factories\MediaFactory;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::factory()->count(10)
            ->has(JobDetailFactory::new())
            ->has(JobApplicationFactory::new()
            ->count(10))
            ->create();
    }
}
