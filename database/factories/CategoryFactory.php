<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

class CategoryFactory extends Factory
{
    public $categories = [
        ['categoryName' => 'Web Development'],
        ['categoryName' => 'Mobile Development'],
        ['categoryName' => 'Data Science'],
        ['categoryName' => 'Design'],
        ['categoryName' => 'Public Relations'],
        ['categoryName' => 'Marketing'],
        ['categoryName' => 'Human Resources'],
        ['categoryName' => 'Sales & Business Development'],
        ['categoryName' => 'Finance & Accounting'],
        ['categoryName' => 'Product Management'],
    ];
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    public function definition()
    {
        return [
            'categoryName' => $this->faker->word,
        ];
    }

    public function persistData()
    {

        Collection::make($this->categories)->map(function ($category) {
            Category::insert([
                'categoryName' => $category['categoryName']
            ]);
        });
    }
}
