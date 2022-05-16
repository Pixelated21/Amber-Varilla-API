<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\JobDetail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;


class JobDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $jobType = ['Full Time', 'Part Time'];
        $jobModality = ['Remote', 'On-Site'];
        return [
            'job_id' => Job::factory(),
            'jobTitle' => $this->faker->jobTitle,
            'jobDescription' => $this->faker->paragraph(5),
            'jobModality' => Arr::random($jobModality),
            'jobType' => Arr::random($jobType),
            'negotiable' => $this->faker->boolean(30),
            'jobSalary' => $this->faker->randomFloat(0, 0, 9999.),
        ];

    }
}
