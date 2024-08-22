<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\ControlPanelInterface;
use App\Models\Modules\Viper\ControlPanel;
use Exception;

class ControlPanelService implements ControlPanelInterface {

    public function createNewControlPanel(Collection $controlPanel): Collection
    {
        $newControlPanel = new ControlPanel($controlPanel->toArray());
        $newControlPanel->save();
        return collect($newControlPanel);
    }

    public function updateControlPanel(Collection $controlPanel, int $id): Collection
    {
        $controlPanelUpdate = ControlPanel::findOrFail($id);
        $controlPanelUpdate->fill($controlPanel->toArray());
        $controlPanelUpdate->save();
        return collect($controlPanelUpdate);
    }

    public function getControlPanelByStageControl(int $stageControlId): Collection
    {
        $controlPanel = ControlPanel::where('stage_control_id', $stageControlId)->firstOrFail();

        return collect($controlPanel);
    }

    public function getAllControlPanelByStageControl(): Collection
    {
        $controlPanel = ControlPanel::with('stageControl')->get();
    
        $groupedControlPanel = $controlPanel->groupBy(function ($panel) {
            return $panel->stageControl->name;
        });
    
        $groupedControlPanel = $groupedControlPanel->map(function ($items) {
            return $items->map(function ($item) {
                return collect($item)->except('stage_control');
            });
        });
    
        return $groupedControlPanel;
    }
    

    public function getControlPanel(int $id): Collection
    {
        $controlPanel = ControlPanel::findOrFail($id);
        return collect($controlPanel);
    }

    public function deleteControlPanel(int $id): Collection
    {
        $controlPanel = ControlPanel::findOrFail($id);
        $controlPanel->delete();

        return collect($controlPanel);
    }
}
