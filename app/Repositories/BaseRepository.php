<?php

namespace App\Repositories;

use Corcel\Post;

abstract class BaseRepository implements Repository
{
    protected $post_type = null;

    /**
     * @return mixed
     */
    public function all()
    {
        return Post::type($this->post_type)->status('publish')->get();
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
        $post = Post::type($this->post_type)->slug($slug)->status('publish')->first();

        apply_filters ( 'wp_title', $post->meta->_yoast_wpseo_title == '' ? $post->post_title : $post->meta->_yoast_wpseo_title);
        
        return $post;
    }
}