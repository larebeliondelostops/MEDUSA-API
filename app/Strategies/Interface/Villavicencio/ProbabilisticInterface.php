<?php

namespace App\Strategies\Interface\Villavicencio;

interface ProbabilisticInterface
{
    public function GetIndicators();
    public function obtenerCuadriculaProbabilisticaPorIndicador($id);
    public function obtenerCuadriculaProbabilisticaGeneral();
}