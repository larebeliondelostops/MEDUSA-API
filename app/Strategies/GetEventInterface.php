<?php

namespace App\Strategies;

interface GetEventInterface
{
    public function getAllEvents();
    public function getEventsType($request);
    public function getEventsForDate($request);
    public function OrderEvents($events);
}