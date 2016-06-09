<?php

namespace App\Options;

use App\Options\Repositories\OptionsRepository;

class OptionsProvider
{
    /**
     * @var OptionsRepository
     */
    private $optionsRepository;

    /**
     * OptionsProvider constructor.
     * @param OptionsRepository $optionsRepository
     */
    public function __construct(OptionsRepository $optionsRepository)
    {
        $this->optionsRepository = $optionsRepository;
    }
    
    public function get($field)
    {
        return $this->optionsRepository->get($field);
    }
}