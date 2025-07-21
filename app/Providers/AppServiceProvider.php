<?php

namespace App\Providers;

use App\Interfaces\JobOfferInterface;
use App\Repositories\JobOfferRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(JobOfferInterface::class, JobOfferRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
