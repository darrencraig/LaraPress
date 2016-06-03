<?php

namespace App\Pages\Repositories;

use App\Repositories\BaseRepository;

class DefaultPageRepository extends BaseRepository implements PageRepository
{
    public function __construct()
    {
        $this->post_type = 'page';
    }
}