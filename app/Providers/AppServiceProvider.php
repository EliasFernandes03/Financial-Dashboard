<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      $this->app->bind(
        \App\Repositories\Contracts\IIndexTransactionRepository::class,
        \App\Repositories\Contracts\IndexTransactionRepository::class
    );
        $this->app->bind(
        \App\Repositories\Contracts\IStoreTransactionRepository::class,
        \App\Repositories\Contracts\StoreTransactionRepository::class
    );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
