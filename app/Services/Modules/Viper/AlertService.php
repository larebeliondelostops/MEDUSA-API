<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\AlertInterface;
use App\Models\Modules\Viper\Alert;
use App\Interfaces\Modules\Viper\ProjectInterface;
use Exception;

/**
 * Servicio de manejo de alertas en el sistema Viper.
 *
 * Implementa la interfaz AlertInterface para definir las operaciones necesarias
 * para la gestión de alertas.
 *
 * @package App\Services\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class AlertService implements AlertInterface{

    private ProjectInterface $projectInterface;

    public function __construct(ProjectInterface $projectInterface)
    {
        $this->projectInterface = $projectInterface;
    }

    
    /**
     * Crea una nueva alerta en el sistema.
     *
     * @param Collection $alert Datos de la alerta a crear.
     * @return Collection Datos de la nueva alerta creada.
     */
    public function createNewAlert(Collection $alert): Collection
    {
        $newAlert = new Alert($alert->toArray());
        $newAlert->save();
        
        return collect($newAlert);
    }

    /**
     * Actualiza una alerta existente en el sistema.
     *
     * @param Collection $alert Datos actualizados de la alerta.
     * @param int $id Identificador de la alerta a actualizar.
     * @return Collection Datos de la alerta actualizada.
     */
    public function updateAlert(Collection $alert, int $id): Collection
    {
        $alertUpdate = Alert::findOrFail($id);
        $alertUpdate->fill($alert->toArray());
        $alertUpdate->save();
        
        return collect($alertUpdate);
    }

    /**
     * Obtiene todas las alertas asociadas a un indicador específico.
     *
     * @param int $indicatorId Identificador del indicador.
     * @return Collection Collection de Collections representando las alertas asociadas al indicador.
     */
    public function getAllAlertsByIndicator(int $indicatorId): Collection
    {
        $alertGot = Alert::where('indicator_id', $indicatorId)->get();
    
        $alerts = $alertGot->transform(
            function (Alert $alert)
            {
                return collect($alert);
            }
        );
        return collect($alerts);
    }

    /**
     * Obtiene todas las alertas asociadas a un project específico.
     *
     * @param int $projectId Identificador del projecto.
     * @return Collection Collection de Collections representando las alertas asociadas al projecto.
     */
    public function getAllAlertsByProject(int $projectId): Collection
    {
        $alertGot = Alert::where('project_id', $projectId)->get();
    
        $alerts = $alertGot->transform(
            function (Alert $alert)
            {
                return collect($alert);
            }
        );
        return collect($alerts);
    }

    /**
     * Obtiene todas las alertas asociadas a un usuario específico.
     *
     * @return Collection Collection de Collections representando las alertas asociadas al usuario especifico.
     */
    public function getAlertsByUser(): Collection
    {
        $user = auth()->user();

        if (!$user) {
            return new Collection(['error' => 'You must log in to access this functionality.']);
        }
    
        if (!$user->hasRole('ApoyoAdmon')) {
            return new Collection(['error' => 'You do not have permission to access this functionality.']);
        }

        $projects = $this->projectInterface->getAllProjects();

        $alertsByProject = collect();
        
        foreach ($projects as $project) {
            $alerts = Alert::where('project_id', $project['bpin'])->get();

            $alerts->makeHidden(['project_id']);

            $alertsByProject->push([
                'project_id' => $project['bpin'],
                'alerts' => $alerts
            ]);
        }

        return $alertsByProject;
    }

    /**
     * Obtiene todas las alertas.
     *
     * @return Collection Collection de Collections representando las alertas.
     */
    public function getAllAlerts(): Collection
    {
        $user = auth()->user();

        if (!$user) {
            return new Collection(['error' => 'You must log in to access this functionality.']);
        }
    
        if (!$user->hasRole('ApoyoAdmon')) {
            return new Collection(['error' => 'You do not have permission to access this functionality.']);
        }
        $alerts = Alert::All();

        return $alerts;
    }

    /**
     * Obtiene los datos de una alerta específica por su identificador.
     *
     * @param int $id Identificador de la alerta.
     * @return Collection Datos de la alerta solicitada.
     */
    public function getAlert(int $id): Collection
    {
        $alert = Alert::findOrFail($id);
        
        return collect($alert);
    }

    /**
     * Elimina una alerta específica por su identificador.
     *
     * @param int $id Identificador de la alerta a eliminar.
     * @return Collection Datos de la alerta eliminada.
     */
    public function deleteAlert(int $id): Collection
    {
        $alert = Alert::findOrFail($id);
        $alert->delete();

        return collect($alert);
    }
}
