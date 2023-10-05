<?php

namespace App\Strategies\Interface;

interface UpdateEventInterface
{
    public function UpdateEvent($request);
    public function asingCoordinateEvent($request, $id_evento);
}
