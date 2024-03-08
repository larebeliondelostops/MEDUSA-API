<?php

namespace App\Http\Controllers\Viper;
use App\Interfaces\Viper\TrackingMatrixInterface;
use Illuminate\Http\Request;

class TrackingMatrixController extends BaseController
{
    private TrackingMatrixInterface $trackingMatrixInterface;

    public function __construct(TrackingMatrixInterface $trackingMatrixInterface)
    {
        $this->trackingMatrixInterface = $trackingMatrixInterface;
    }

    public function show(Request $request, string $projectBpin)
    {
        return response()->json([
            "trackingMatrix" => $this->trackingMatrixInterface->getTrackingMatrixOfProject($projectBpin)
        ]);
    }   
}