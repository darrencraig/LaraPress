<?php

namespace App\Pages;

use App\Pages\Repositories\CachingPageRepository;
use App\Pages\Repositories\DefaultPageRepository;
use App\Pages\Repositories\PageRepository;
use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PageRepository::class, function ($app) {
            return app(DefaultPageRepository::class);
        });
    }
}