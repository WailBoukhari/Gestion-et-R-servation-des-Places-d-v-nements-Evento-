<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Get a random user who will act as the organizer
        $organizerId = User::role('organizer')->inRandomOrder()->first()->id;

        // Generate random start and end times for the event
        $startDateTime = $this->faker->dateTimeBetween('+1 week', '+2 weeks');
        $endDateTime = Carbon::instance($startDateTime)->addHours($this->faker->numberBetween(1, 5));

        // Generate a random image URL from Lorem Picsum
        $imageUrl = 'https://picsum.photos/800/600?random=' . $this->faker->unique()->numberBetween(1, 1000);

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'start_time' => $startDateTime,
            'end_time' => $endDateTime,
            'location' => $this->faker->address,
            'available_seats' => $this->faker->numberBetween(50, 200),
            'organizer_id' => $organizerId,
            'image' => $imageUrl,
        ];
    }
}
