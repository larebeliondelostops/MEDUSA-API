<?php

namespace App\Interfaces\Reports;
use Illuminate\Http\Request;

interface ReportActionsInterface
{
    public function getReportsData(Request $request);

    public function getCacheKeyReport(): string;
}