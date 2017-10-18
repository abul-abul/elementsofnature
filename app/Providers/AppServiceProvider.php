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
            'App\Contracts\BackgroundInterface',
            'App\Services\BackgroundService'
        );
        $this->app->bind(
            'App\Contracts\GalleryInterface',
            'App\Services\GalleryService'
        );
        $this->app->bind(
            'App\Contracts\InYOurSpaceInterface',
            'App\Services\InYOurSpaceService'
        );
        $this->app->bind(
            'App\Contracts\FooterInterface',
            'App\Services\FooterService'
        );
        $this->app->bind(
            'App\Contracts\InYourSpaceTextInterface',
            'App\Services\InYourSpaceTextService'
        );
        $this->app->bind(
            'App\Contracts\GalleryCategoryInterface',
            'App\Services\GalleryCategoryService'
        );
        $this->app->bind(
            'App\Contracts\GalleryCategoryInterface',
            'App\Services\GalleryCategoryService'
        );
        $this->app->bind(
            'App\Contracts\GalleryCategoryImagesInterface',
            'App\Services\GalleryCategoryImagesService'
        );
        $this->app->bind(
            'App\Contracts\GalleryCategoryImagesInnerInterface',
            'App\Services\GalleryCategoryImagesInnerService'
        );
        $this->app->bind(
            'App\Contracts\GalleryCategoryImagesInnerTopInterface',
            'App\Services\GalleryCategoryImagesInnerTopService'
        );
        $this->app->bind(
            'App\Contracts\SizePriceInterface',
            'App\Services\SizePriceService'
        );
        $this->app->bind(
            'App\Contracts\WorkShopInterface',
            'App\Services\WorkShopService'
        );
        $this->app->bind(
            'App\Contracts\SkillInterface',
            'App\Services\SkillService'
        );
        $this->app->bind(
            'App\Contracts\PhotoTourInterface',
            'App\Services\PhotoTourService'
        );
        $this->app->bind(
            'App\Contracts\ConnectInterface',
            'App\Services\ConnectService'
        );
        $this->app->bind(
            'App\Contracts\GalleryCategoryFrameInterface',
            'App\Services\GalleryCategoryFrameService'
        );
    }
}
