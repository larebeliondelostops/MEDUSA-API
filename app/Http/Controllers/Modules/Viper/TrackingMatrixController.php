<?php

namespace App\Http\Controllers\Modules\Viper;
use App\Interfaces\Modules\Viper\TrackingMatrixInterface;
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