<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create admin user
        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
        ]);
        $admin->assignRole('admin');

        // Create organizer users
        User::factory()->count(4)->create()->each(function ($organizer) {
            $organizer->assignRole('organizer');
        });

        // Create regular users
        User::factory()->count(10)->create()->each(function ($user) {
            $user->assignRole('user');
        });
    }
}
