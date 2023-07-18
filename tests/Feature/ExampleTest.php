<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_permissions_creating(): void
    {
       $permissionEntities = ['user', 'client', 'project', 'task'];
       $permissionActions = ['access', 'show', 'create', 'update', 'delete'];

       foreach($permissionEntities as $permissionEntity)
       {
          foreach ($permissionActions as $key => $permissionAction)
          {
             $permissions = Permission::create(['name' =>  $permissionAction.'_'.$permissionEntity]);
          }
       }

       $this->assertDatabaseHas('permissions', [
          'name' => 'access_user'
       ]);
    }
}
