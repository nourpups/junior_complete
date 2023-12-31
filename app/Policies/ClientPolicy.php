<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClientPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('access_client');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
       return $user->hasPermissionTo('create_client');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Client $client): bool
    {
       return $user->hasPermissionTo('update_client');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Client $client): bool
    {
       return $user->hasPermissionTo('delete_client');
    }
}
