<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Interfaces\Modules\Viper\ActivityControlInterface;
use Illuminate\Http\Response; 

class ActivityControlController extends BaseController
{
    private ActivityControlInterface $activityControlInterface;

    public function __construct(ActivityControlInterface $activityControlInterface)
    {
        parent::__construct();
        $this->activityControlInterface = $activityControlInterface;
    }

    public function index(int $projectId)
    {
        try {
            $activityControl = $this->activityControlInterface->getAllActivityControlByProject($projectId);

            return response()->json([
                'data' => $activityControl,
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function view(int $projectId)
    {
        try {
            $activityControl = $this->activityControlInterface->getActivitiesControlByProject($projectId);

            return response()->json([
                'data' => $activityControl,
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
