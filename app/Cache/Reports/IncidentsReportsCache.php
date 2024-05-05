<?php

namespace App\Cache\Reports;

use Illuminate\Support\Facades\Cache;
use App\Cache\Reports\BaseCacheReport;
use App\Interfaces\Reports\ReportActionsInterface;
use App\Strategies\StrategiesReports\Villavicencio\StrategyIncidentsReports;

class IncidentsReportsCache extends BaseCacheReport implements ReportActionsInterface
{
    public function __construct(
        private StrategyIncidentsReports $strategyIncidents)
    {
        parent::__construct($strategyIncidents, 'report_incident');
    }

    public function getReportsData($request)
    {
        return Cache::remember($this->key, self::TTL, function() use ($request) {
            return $this->strategy->getReportsData($request);
        });
    }
}