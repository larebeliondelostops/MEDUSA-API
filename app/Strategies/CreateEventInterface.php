<?php

namespace App\Strategies;

interface CreateEventInterface
{
    public function createEvent($request);
    public function asingCoordinateEvent($request, $id_evento);
}