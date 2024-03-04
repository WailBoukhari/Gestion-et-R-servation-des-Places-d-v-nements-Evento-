<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $organizerRole = Role::firstOrCreate(['name' => 'organizer']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create admin user
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole($adminRole);

        // Create organizer users
        User::factory()->count(4)->create()->each(function ($organizer) use ($organizerRole) {
            $organizer->assignRole($organizerRole);
            $organizer->email_verified_at = now();
            $organizer->save();
        });

        // Create regular users
        User::factory()->count(10)->create()->each(function ($user) use ($userRole) {
            $user->assignRole($userRole);
            $user->email_verified_at = now();
            $user->save();
        });
    }
}
