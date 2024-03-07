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
    public function run()
    {
        // Define permissions for managing categories
        Permission::create(['name' => 'manage categories']);
        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'delete categories']);

        // Define permissions for managing events
        Permission::create(['name' => 'view organizer statistics']);
        Permission::create(['name' => 'manage organizer event']);
        Permission::create(['name' => 'approve events']);
        Permission::create(['name' => 'create events']);
        Permission::create(['name' => 'edit events']);
        Permission::create(['name' => 'delete events']);

        // Define permissions for managing reservations
        Permission::create(['name' => 'manage reservations']);
        Permission::create(['name' => 'accept reservations']);
        Permission::create(['name' => 'cancel reservations']);

        // Define permissions for managing users
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'suspend users']);
        Permission::create(['name' => 'activate users']);
    }
}
