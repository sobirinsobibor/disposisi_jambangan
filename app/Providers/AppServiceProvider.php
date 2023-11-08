<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('admin', function (User $user) {
            return $user->roleid == 1;
        });

        Gate::define('camat', function (User $user) {
            return $user->roleid == 2;
        });

        Gate::define('sekcam', function (User $user) {
            return $user->roleid == 3;
        });

        Gate::define('operator', function (User $user) {
            return $user->roleid == 4;
        });

        Gate::define('kasikasubag', function (User $user) {
            return $user->roleid == 5;
        });
    }
}
