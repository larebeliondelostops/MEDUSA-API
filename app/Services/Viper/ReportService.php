<?php

namespace App\Services\Viper;

use App\DTOs\Viper\Report\ReportDTO;
use App\DTOs\Viper\Report\ReportWithProofDTO;
use App\Interfaces\Viper\ReportInterface;
use App\Models\Viper\Report;
use Exception;

class ReportService implements ReportInterface
{

    public function createNewReport(ReportDTO $reportDTO): ReportDTO
    {
        $report = new Report();
        $report->fill($reportDTO->toArray());
        $report->save();
        
        return new ReportDTO($report->toArray());
    }

    public function updateReport(ReportDTO $reportDTO, int $id): ReportDTO
    {
        $report = Report::findOrFail($id);
        $report->fill($reportDTO->toArray());
        $report->save();

        return new ReportDTO($report->toArray());
    }
    
    public function getAllReportsByProduct(int $productId): array
    {
        $reports = Report::where('product_id', $productId)->get();
    
        $reportDTOs = $reports->map(function ($report) {
            return new ReportDTO($report->toArray());
        })->all();
    
        return $reportDTOs;
    }

    public function getAllReportsByProductWithProof(int $productId): array
    {
        $reports = Report::with('proofs')->where('product_id', $productId)->get();

        $reportDTOs = $reports->map(function ($report) {
            return new ReportWithProofDTO($report->toArray());
        })->all();

        return $reportDTOs;
    }

    public function getReport(int $id): ReportDTO
    {
        $report = Report::findOrFail($id);
        
        return new ReportDTO($report->toArray());
    }

    public function deleteReport(int $id): ReportDTO
    {
        $report = Report::findOrFail($id);
        $reportDTO = new ReportDTO($report->toArray());
        $report->delete();

        return $reportDTO;
    }
}
