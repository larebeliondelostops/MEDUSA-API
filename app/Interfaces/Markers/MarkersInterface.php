<?php

namespace App\Interfaces\Markers;

interface MarkersInterface
{
    public function allPoints();

    public function allLines();

    public function allPolygons();

    public function getInfoPoint($uuid, $markerType);
}
