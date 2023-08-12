<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

       ViewFacade::composer('layouts.backend', function (View $view) {
         $view->with('unreadNotificationsCount', auth()->user()->unreadNotifications()->count());
       });

        // I edited pagination template from bootstrap 4 to bootstrap 5 (ctrl+click)
        Paginator::useBootstrap();
    }
}
