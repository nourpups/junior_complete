<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionEntities = ['user', 'client', 'project', 'task'];
        $permissionActions = ['access', 'show', 'create', 'update', 'delete'];

        foreach($permissionEntities as $permissionEntity)
        {
            foreach ($permissionActions as $permissionAction)
            {
               Permission::create(['name' =>  $permissionAction.'_'.$permissionEntity]);
            }
        }

    }
}
