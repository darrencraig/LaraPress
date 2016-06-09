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
        add_action( 'wp_enqueue_scripts', function()
        {
            wp_register_style( 'theme-styles', __DIR__ . 'css/site.css' );
            wp_enqueue_style( 'theme-styles' );
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
