<?php

namespace App\Http\Controllers\Modules\Viper;
use App\Interfaces\Modules\Viper\ScheduleInterface;
use Exception;
use Illuminate\Http\Response;

class ScheduleController extends BaseController
{
    private ScheduleInterface $scheduleInterface;

    public function __construct(ScheduleInterface $scheduleInterface)
    {
        parent::__construct();
        $this->scheduleInterface = $scheduleInterface;
    }

    public function show(string $projectBpin)
    {
        try
        {
            return response()->json([
                "data" => $this->scheduleInterface->generateProjectEDT($projectBpin)
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

}
