<?php

namespace App\Options\Repositories;

use App\Options\Repositories\OptionsRepository;

class DefaultOptionsRepository implements OptionsRepository
{

    public function get($field)
    {
        return get_field($field, 'option');
    }
}