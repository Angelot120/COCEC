<?php

namespace App\Providers;

use App\Interfaces\JobOfferInterface;
use App\Repositories\JobOfferRepository;
use Illuminate\Support\ServiceProvider;

class JobOfferProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(JobOfferInterface::class, JobOfferRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
