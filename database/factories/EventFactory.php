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
        $organizerId = User::role('organizer')->inRandomOrder()->first()->id;

        $startDateTime = $this->faker->dateTimeBetween('+1 week', '+2 weeks');
        $endDateTime = Carbon::instance($startDateTime)->addHours($this->faker->numberBetween(1, 5));

        $imageNumber = $this->faker->numberBetween(1, 6);
        $imageUrl = 'images/event/event-list-' . $imageNumber . '.jpg';

        $accepted = $this->faker->boolean;

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'start_time' => $startDateTime,
            'end_time' => $endDateTime,
            'location' => $this->faker->address,
            'available_seats' => $this->faker->numberBetween(50, 200),
            'organizer_id' => $organizerId,
            'validated' => true,
            'image' => $imageUrl,
            'auto_accept_reservation' => $accepted,
        ];

    }

}
