<?php

namespace App\Interfaces\Reports;
use Illuminate\Http\Request;

interface ReportInterface
{
    public function getReportsData(Request $request, $method, $slug);
}