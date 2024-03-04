<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $roles = [
            'admin' => 'admin.com',
            'organizer' => 'organizer.com',
            'user' => 'user.com',
        ];

        $role = $this->faker->randomElement(array_keys($roles));

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->userName . '@' . $roles[$role],
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
