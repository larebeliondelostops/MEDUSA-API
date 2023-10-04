<?php

namespace App\Strategies;

interface UpdateEventInterface
{
    public function UpdateEvent($request);
    public function asingCoordinateEvent($request, $id_evento);
}
