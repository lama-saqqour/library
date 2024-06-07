<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('create-author', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('list-authors', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('update-author', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('view-author', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('delete-author', function (User $user) {
            return $user->is_admin;
        });
        
        Gate::define('create-book', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('list-books', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('update-book', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('view-book', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('delete-book', function (User $user) {
            return $user->is_admin;
        });
    }
}
