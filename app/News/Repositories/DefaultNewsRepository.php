<?php

namespace App\News\Repositories;

use App\Repositories\BaseRepository;

class DefaultNewsRepository extends BaseRepository implements NewsRepository
{
    public function __construct()
    {
        $this->post_type = 'news';
    }
}