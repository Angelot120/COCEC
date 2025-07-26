<?php

namespace App\Providers;

use App\Interfaces\AgencyLocationInterface;
use App\Repositories\AgencyLocationRepository;
use Illuminate\Support\ServiceProvider;

class AgencyLocationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
         $this->app->bind(AgencyLocationInterface::class, AgencyLocationRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
