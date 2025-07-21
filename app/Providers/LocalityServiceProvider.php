<?php

namespace App\Providers;

use App\Interfaces\LocalityInterface;
use App\Repositories\LocalityRepository;
use Illuminate\Support\ServiceProvider;

class LocalityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(LocalityInterface::class, LocalityRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
