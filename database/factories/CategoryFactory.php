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
        // Generate a random image URL from Lorem Picsum
        $imageUrl = 'https://picsum.photos/200/300?random=' . $this->faker->unique()->numberBetween(1, 1000);

        return [
            'name' => $this->faker->word,
            'image' => $imageUrl,
        ];
    }
}
