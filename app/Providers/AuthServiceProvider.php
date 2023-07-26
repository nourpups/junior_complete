<?php

namespace App\Providers;

use App\Http\Controllers\PermissionController;
use App\Policies\RolePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
          Role::class => RolePolicy::class,
          Permission::class => PermissionController::class,
          // authorizing these policies manually because models that auto-discovered by $this->registerPolicies()
          // the policies must be in a Policies directory at or above the directory that contains your models
          // Link: https://laravel.com/docs/10.x/authorization#registering-policies:~:text=Specifically%2C%20the%20policies,contains%20your%20models
          // Note that I use these models provided from the spatie/laravel-permission package.
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });
    }
}
