<?php

namespace App\Services\Modules\Viper;

use App\Events\Modules\Viper\ViperWebSocket;
use Illuminate\Support\Collection;
use App\Models\Modules\Viper\Activity;
use App\Models\Modules\Viper\Project;
use App\Interfaces\Modules\Viper\ProjectInterface;
use Exception;

class ActivityControlService implements ActivityControlInterface{

    private ProjectInterface $projectInterface;

    public function __construct(ProjectInterface $projectInterface)
    {
        $this->projectInterface = $projectInterface;
    }

    public function getAllActivityControlByProject(String $projectId): Collection
    {
        $activities = Activity::whereHas('deliverable.product.specificObjective.scope', function ($query) use ($projectId) {
            $query->where('project_id', $projectId);
        })
        ->with('progress') 
        ->get();

        $project = Project::where('bpin', $bpin)
        ->select('start_date_execution_phase', 'completion_date')
        ->first();
    }
}
