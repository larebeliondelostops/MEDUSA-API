<?php

namespace App\Cache\Reports;

use Illuminate\Support\Facades\Cache;

abstract class BaseCacheReport
{
    const TTL = 864000;
    protected $strategy;
    protected $key;

    public function __construct(Object $strategy, string $key)
    {
        $this->strategy = $strategy;
        $this->key = $key;
    }

    protected function forget($key)
    {
        Cache::forget($key);
    }
}