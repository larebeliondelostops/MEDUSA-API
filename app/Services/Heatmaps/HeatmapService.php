<?php

namespace App\Services\Heatmaps;

use App\Factories\HeatmapFactory;
use App\Interfaces\Heatmaps\HeatmapInterface;

class HeatmapService implements HeatmapInterface
{

    public function __construct(
        private HeatmapFactory $heatmapFactory
    )
    {}

    public function index($slug)
    {
        return $this->heatmapFactory->getStrategy($slug)->getPoints($request);
    }
}