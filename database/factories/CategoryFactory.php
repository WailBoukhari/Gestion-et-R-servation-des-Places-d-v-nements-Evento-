<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Predefined category names and images
        $categories = [
            ['name' => 'Food Fest', 'image' => 'images/cat-1.png'],
            ['name' => 'Concert', 'image' => 'images/cat-2.png'],
            ['name' => 'Movie Fest', 'image' => 'images/cat-3.png'],
            ['name' => 'Magic Show', 'image' => 'images/cat-4.png'],
            ['name' => 'Art & Craft', 'image' => 'images/cat-5.png'],
        ];

        // Randomly select a category from the predefined list
        $category = $this->faker->randomElement($categories);

        return [
            'name' => $category['name'],
            'image' => $category['image'],
        ];
    }
}
