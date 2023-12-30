<?php

namespace App\Providers;

use App\Contracts\BestHotelsInterface;
use App\Contracts\TopHotelsInterface;
use App\Services\BestHotelsService;
use App\Services\TopHotelsService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BestHotelsInterface::class, BestHotelsService::class);
        $this->app->bind(TopHotelsInterface::class, TopHotelsService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
