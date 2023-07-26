<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Spatie\Permission\Models\Permission;

class PermissionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('access_permission');
    }
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
       return $user->hasPermissionTo('create_permission');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Permission $permission): bool
    {
       return $user->hasPermissionTo('update_permission');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Permission $permission): bool
    {
       return $user->hasPermissionTo('delete_permission');
    }
}
