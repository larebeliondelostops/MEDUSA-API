<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface StrategyInterface
{
    public function getModel() : Model;
}
