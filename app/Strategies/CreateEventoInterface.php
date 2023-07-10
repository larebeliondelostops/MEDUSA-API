<?php

namespace App\Strategies;

interface CreateEventoInterface
{
    public function createEvent($request);
    public function asingCoordenadaEvent($request, $id_evento);
}