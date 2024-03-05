<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $categories = Category::all();

        if ($categories->isEmpty()) {
            $this->call(CategorySeeder::class);

            $categories = Category::all();
        }

        Event::factory()->count(10)->create()->each(function ($event) use ($categories, $faker) {
            $category = $categories->random();
            $event->category()->associate($category);
            $event->save();
        });
    }
}
