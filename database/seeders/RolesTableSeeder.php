<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo([
            'manage users',
            'manage categories',
            'approve events',
            'view statistics',
            'manage organizer event'
        ]);

        $organizerRole = Role::firstOrCreate(['name' => 'organizer']);
        $organizerRole->givePermissionTo([
            'manage organizer profile',
            'view organizer statistics',
            'manage organizer event'
        ]);

        $userRole = Role::firstOrCreate(['name' => 'user']);
        $userRole->givePermissionTo('manage user reserve');
    }
}
