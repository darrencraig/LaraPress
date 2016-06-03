<?php

namespace App\News;

use App\News\Repositories\CachingNewsRepository;
use App\News\Repositories\DefaultNewsRepository;
use App\News\Repositories\NewsRepository;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\ServiceProvider;

class NewsServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NewsRepository::class, function ($app) {
            return app(DefaultNewsRepository::class);
        });

        $this->loadCustomPostTypes();
    }

    /**
     * Register the custom post type
     */
    public function registerPostType()
    {
        \register_post_type( 'news',
            array(
                'labels' => array(
                    'name' => __( 'News' ),
                    'singular_name' => __( 'News Article' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'news'),
            )
        );

        $this->registerCustomFields();
    }

    /**
     * Register the custom fields for the obove post type.
     */
    public function registerCustomFields()
    {
        if( function_exists('acf_add_local_field_group') ) {
            \acf_add_local_field_group(array(
                'key' => 'news_fields',
                'title' => 'News',
                'fields' => array (
                    array (
                        'key' => 'subtitle',
                        'label' => 'Subtitle',
                        'name' => 'subtitle',
                        'type' => 'text',
                    )
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'news',
                        ),
                    ),
                ),
            ));
        }


    }

    private function loadCustomPostTypes()
    {
        \add_action( 'load_post_type', [$this, 'registerPostType']);
        \do_action('load_post_type');
    }
}