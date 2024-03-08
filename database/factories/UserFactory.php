<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

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
            'organizer',
            'user',
        ];

        $role = $this->faker->randomElement(array_keys($roles));
        $role = $this->faker->randomElement($roles);

        // Find or create role
        Role::findByName($role) ?? Role::create(['name' => $role]);

        // Generate email based on name and role
        $name = $this->faker->unique()->userName;
        $email = str_replace('.', '_', $name) . '@' . $role . '.com';


        return [
            'name' => $name,
            'email' => $email,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
}