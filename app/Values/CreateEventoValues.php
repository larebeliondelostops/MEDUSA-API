<?php

namespace App\Values;

use App\Strategies\CreateEventos\CreateEventoCoordenada;

final class CreateEventoValues
{
    const STRATEGY = [
        'EventoCoordenada' => CreateEventoCoordenada::class,
    ];
}