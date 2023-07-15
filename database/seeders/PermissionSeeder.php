<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'access_client',
            'show_client',
            'create_client',
            'update_client',
            'delete_client',

            'access_user',
            'show_user',
            'create_user',
            'update_user',
            'delete_user',

            'access_project',
            'show_project',
            'create_project',
            'update_project',
            'delete_project',

            'access_task',
            'show_task',
            'create_task',
            'update_task',
            'delete_task',

        ];

        foreach($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }

    }
}
