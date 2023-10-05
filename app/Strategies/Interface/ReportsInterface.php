<?php

namespace App\Strategies\Interface;
use Illuminate\Http\Request;

interface ReportsInterface
{
    //reportes de eventos
    public function getReportsData();
    public function EventsForMonth();
    public function EventsForType();
    public function EventsByAuthorizingEntity();
    public function EventsByCapacityRange();
    public function EventsPastAndFuture();
    public function EventsByTypeAndAuthorizingEntity();

    //reportes de criminalidad

    public function StatisticsByIndicatorAndGrid(Request $request);
    public function StatisticsGeneral(Request $request);
}