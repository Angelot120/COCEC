<?php

namespace App\Providers;

use App\Interfaces\AnnouncementsInterface;
use App\Repositories\AnnouncementsRepository;
use Illuminate\Support\ServiceProvider;

class AnnouncementsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(AnnouncementsInterface::class, AnnouncementsRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
