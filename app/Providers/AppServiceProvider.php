<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Contracts\PartnersInterface',
            'App\Services\PartnersService'
        );
        $this->app->bind(
            'App\Contracts\HomeBgInterface',
            'App\Services\HomeBgService'
        );
        $this->app->bind(
            'App\Contracts\GalleryInterface',
            'App\Services\GalleryService'
        );
    }
}
