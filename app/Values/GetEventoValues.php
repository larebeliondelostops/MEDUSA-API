<?php

namespace App\Values;

use App\Strategies\GetEventos\GetEventoCoordenada;

final class GetEventoValues
{
    const STRATEGY = [
        'EventoCoordenada' => GetEventoCoordenada::class,
    ];
}