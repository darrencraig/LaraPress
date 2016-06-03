<?php

namespace App\Videos;

use App\News\Repositories\CachingNewsRepository;
use App\News\Repositories\DefaultVideoRepository;
use App\News\Repositories\VideoRepository;
use Illuminate\Support\ServiceProvider;

class VideoServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(VideoRepository::class, function ($app) {
            return app(DefaultVideoRepository::class);
        });

        $this->loadCustomPostTypes();
    }

    /**
     * Register the custom post type
     */
    public function registerPostType()
    {
        register_post_type( 'video',
            array(
                'labels' => array(
                    'name' => __( 'Videos' ),
                    'singular_name' => __( 'Video' ),
                    'add_new' => "Add Video",
                    'add_new_item' => "Add Video",
                    'all_items' => 'All Videos',
                    'view_item' => "View Video",
                    'edit_item' => "Edit Video",
                    'new_item' => "New Video",
                ),
                'menu_position' => 20,
                'menu_icon' => 'dashicons-video-alt3',
                'supports' => array('title', 'revisions', 'author'),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'video')
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

            acf_add_local_field_group(array(
                'key' => 'minus40_acf_video_fields',
                'title' => 'Audio / Video Content',
                'fields' => array(
                    array(
                        'key' => 'minus40_acf_video_id',
                        'label' => 'Video ID',
                        'name' => 'video_id',
                        'type' => 'text',
                        'instructions' => 'You should get the unique ID for this media clip. For example in http://youtube.com/watch?v=ngElkyQ6Rhs, it is everything after the "v=" i.e. ngElkyQ6Rhs',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => 20,
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array(
                        'key' => 'minus40_acf_video_type',
                        'label' => 'AV Type',
                        'name' => 'video_type',
                        'type' => 'select',
                        'instructions' => 'You must select from these approved host sites.',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'youtube' => 'YouTube',
                            'vimeo' => 'Vimeo',
                            'soundcloud' => 'SoundCloud'
                        ),
                        'default_value' => array(
                            '' => '',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'placeholder' => '',
                        'disabled' => 0,
                        'readonly' => 0,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'video',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
            ));

        }

    }

    private function loadCustomPostTypes()
    {
        \add_action( 'load_post_type', [$this, 'registerPostType']);
        \do_action('load_post_type');
    }
}