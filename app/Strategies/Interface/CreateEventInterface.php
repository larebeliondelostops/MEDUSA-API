<?php

namespace App\Strategies\Interface;

interface CreateEventInterface
{
    public function createEvent($request);
    public function asingCoordinateEvent($request, $id_evento);
}