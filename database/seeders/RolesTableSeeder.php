<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        $organizerRole = Role::firstOrCreate(['name' => 'organizer']);
        $organizerRole->givePermissionTo([
            'manage organizer event',
            'view organizer statistics',
            'manage organizer event',
            'create events',
            'edit events',
            'delete events',
            'accept reservations',
            'manage reservations',
        ]);

        $userRole = Role::firstOrCreate(['name' => 'user']);
        $userRole->givePermissionTo([
            'cancel reservations',
            'manage reservations',
            'make reservation'
        ]);
    }
}
