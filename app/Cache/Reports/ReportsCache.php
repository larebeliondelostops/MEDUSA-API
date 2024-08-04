<?php

namespace App\Cache\Reports;

use Illuminate\Support\Facades\Cache;
use App\Interfaces\Reports\ReportActionsInterface;

class ReportsCache implements ReportActionsInterface
{
    const TTL = 864000;

    private $key;

    public function __construct(
        private ReportActionsInterface $strategyReport)
    {
        $this->strategyReport = $strategyReport;
        $this->key = $this->getCacheKeyReport();
    }

    public function getCacheKeyReport(): string
    {
        return $this->strategyReport->getCacheKeyReport();
    }

    public function getReportsData($request)
    {
        if (isset($request->start)) {
            return $this->strategyReport->getReportsData($request);
        }

        return Cache::remember($this->key, self::TTL, function() use ($request) {
            return $this->strategyReport->getReportsData($request);
        });
    }
}