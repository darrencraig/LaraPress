<?php

namespace App\Repositories;

interface Repository
{
    public function all();

    public function findBySlug($slug);
}