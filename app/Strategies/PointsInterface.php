<?php

namespace App\Strategies;

use \Illuminate\Http\Request;

interface PointsInterface
{
    public static function all();

    public static function getInfoPoint($uuid);
}
