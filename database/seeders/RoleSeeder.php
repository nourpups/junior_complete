<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

//      |-----------------------NOTICE-------------------------------------------|
//      |  gets all permissions via Gate::before rule; check AuthServiceProvider |
        Role::create(['name' => 'Super Admin']);
//      |------------------------------------------------------------------------|

        $role = Role::create(['name' => 'User']);

       $userPermissionEntities = ['project', 'task'];
       $permissionActions = ['access'];

       foreach($userPermissionEntities as $userPermissionEntity)
       {
          foreach ($permissionActions as $permissionAction)
          {
             $role->givePermissionTo($permissionAction.'_'.$userPermissionEntity);
          }
       }
    }
}
