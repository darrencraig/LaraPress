<?php

namespace App\News\Repositories;

use App\Repositories\Repository;

class NewsRepository extends Repository
{
    public function __construct()
    {
        $this->post_type = 'news';
    }
}