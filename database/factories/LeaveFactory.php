<?php

namespace Database\Factories;

use App\Models\Leave;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

class LeaveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Leave::class;

    protected array $leaves = [
        ['leaveName' => 'Vacation', 'total' => 30],
        ['leaveName' => 'Sick', 'total' => 20],
//        ['leaveName' => 'Maternity', 'total' => 60],
//        ['leaveName' => 'No Pay', 'total' => 10],
//        ['leaveName' => 'Civic Duty', 'total' => 20],
//        ['leaveName' => 'Study', 'total' => 120],
        ['leaveName' => 'Personal', 'total' => 40],
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'leaveName' => $this->faker->word,
            'total' => $this->faker->numberBetween(5, 20),
        ];
    }

    public function persistData()
    {
        Collection::make($this->leaves)->map(function ($leave) {
            Leave::insert([
                'leaveName' => $leave['leaveName'],
                'total' => $leave['total']
            ]);
        });
    }

}
