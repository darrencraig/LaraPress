<?php

namespace App\Options\Repositories;

use Illuminate\Contracts\Cache\Repository;

class CachingOptionsRepository implements OptionsRepository
{
    /**
     * @var DefaultOptionsRepository
     */
    private $optionsRepository;

    /**
     * CachingOptionsRepository constructor.
     * @param DefaultOptionsRepository $optionsRepository
     */
    public function __construct(DefaultOptionsRepository $optionsRepository, Repository $cache)
    {
        $this->optionsRepository = $optionsRepository;
    }

    /**
     * @param $field
     * @return mixed|null|void
     */
    public function get($field)
    {
        return $this->cache->remember('options.' . $field, 5, function()
        {
            return $this->optionsRepository->get($field);
        });
    }
}