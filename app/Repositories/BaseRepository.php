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
        return Post::type($this->post_type)->slug($slug)->status('publish')->first();
    }
}