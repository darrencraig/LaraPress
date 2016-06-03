<?php

namespace App\Pages\Repositories;

use Illuminate\Contracts\Cache\Repository;
use App\Repositories\BaseRepository;

class CachingPageRepository extends BaseRepository implements PageRepository
{
    /**
     * @var PageRepository
     */
    private $pageRepository;
    /**
     * @var Factory
     */
    private $cache;

    /**
     * PageRepository constructor.
     * @param DefaultPageRepository $pageRepository
     * @param Repository $cache
     */
    public function __construct(DefaultPageRepository $pageRepository, Repository $cache)
    {
        $this->post_type = 'page';
        $this->pageRepository = $pageRepository;
        $this->cache = $cache;
    }

    public function all()
    {
        return $this->cache->remember('page.all', 5, function() {
            return $this->pageRepository->all();
        });
    }
}