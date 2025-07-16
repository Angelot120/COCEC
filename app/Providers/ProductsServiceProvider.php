<?php

namespace App\Providers;

use App\Interfaces\ProductsInterface;
use App\Repositories\ProductsRepository;
use Illuminate\Support\ServiceProvider;

class ProductsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ProductsInterface::class, ProductsRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
