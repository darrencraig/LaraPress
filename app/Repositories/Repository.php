<?php

namespace App\Repositories;

abstract class Repository
{
    protected $post_type = null;

    public function all()
    {
        return new \WP_Query([
            'post_type' => $this->post_type,
        ]);
    }

    public function findBySlug($slug)
    {
        return new \WP_Query([
            'post_type' => $this->post_type,
            'pagename' => $slug
        ]);
    }
}