<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PostThumbnailServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->enableThumbnailSupport();
        $this->registerImageSizes();
    }

    /**
     *
     */
    private function registerImageSizes()
    {
        add_image_size( 'thumb-landscape', 384, 216, true );
        add_image_size( 'thumb-portrait', 216, 384, true );
        add_image_size( 'thumb-square', 384, 384, true );
        add_image_size( 'large-landscape', 768, 432, true );
        add_image_size( 'large-portrait', 432, 768, true );
        add_image_size( 'large-square', 768, 768, true );
    }

    /**
     *
     */
    private function enableThumbnailSupport()
    {
        add_theme_support( 'post-thumbnails' );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }
}
