<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use App\Repository\Contracts\{
    UserRepositoryInterface
};
use App\Repository\Eloquent\{
    UserRepository
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
    }
}
