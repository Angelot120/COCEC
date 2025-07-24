<?php

namespace App\Providers;

use App\Interfaces\AnnouncementInterface;

use App\Repositories\AnnouncementRepository;

use Illuminate\Support\ServiceProvider;

class AnnouncementsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(AnnouncementInterface::class, AnnouncementRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
