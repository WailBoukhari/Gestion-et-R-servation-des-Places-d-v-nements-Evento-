<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Reservation Permissions
        Permission::create(['name' => 'manage user reserve']);

        // Organizer Permissions
        Permission::create(['name' => 'manage organizer profile']);
        Permission::create(['name' => 'view organizer statistics']);
        Permission::create(['name' => 'manage organizer event']);
       
        // Admin Permissions
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage categories']);
        Permission::create(['name' => 'approve events']);
        Permission::create(['name' => 'view statistics']);
    }
}
