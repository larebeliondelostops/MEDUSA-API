<?php

namespace App\Strategies\Interface;

use \Illuminate\Http\Request;

interface PointsInterface
{
    public static function all();

    public static function getInfoPoint($uuid);
}
