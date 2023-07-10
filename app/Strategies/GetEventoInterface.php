<?php

namespace App\Strategies;

interface GetEventoInterface
{
    public function getAllEvents();
    public function getTipoEvents($request);
    public function getEventsForDate($request);
}