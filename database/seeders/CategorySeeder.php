<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create three event categories
        $categories = Category::factory()->count(5)->create();

        // For each category, create an event and associate it with the category
        foreach ($categories as $category) {
            Event::factory()->create([
                'category_id' => $category->id,
            ]);
        }
    }
}
