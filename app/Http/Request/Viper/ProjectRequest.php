<?php

namespace App\Http\Request\Viper;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


/**
 * Request personalizado para la validación de proyectos.
 *
 * Este FormRequest se utiliza para validar las solicitudes entrantes para la creación y actualización de proyectos,
 * garantizando que todos los datos necesarios estén presentes y sean correctos antes de que la solicitud
 * llegue al controlador.
 * @package    App\Http\Request\Viper
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class ProjectRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Reglas de validación que se aplicarán a la solicitud.
     *
     * @return array Reglas de validación.
     */
    public function rules()
    {
        return [
            'bpin' => 'required|string|max:255',
            'name' => 'required|string|max:100',
            'ocad' => 'required|string|max:100',
            'state_id' => 'required|integer',
            'substate_id' => 'required|integer',
            'total_value' => 'required|numeric',
            'requested_value' => 'required|numeric',
            'responsible_entity' => 'required|string|max:255',
            'sector_id' => 'required|integer',
            'type_location' => 'required|string',
            'latitude_location' => 'required|numeric',
            'longitude_location' => 'required|numeric',
            'department_id' => 'required|integer',
            'municipality_id' => 'required|integer',
            'beneficiaries' => 'required|integer',
            'planner' => 'required|string|max:255',
            'execution_approval_date' => 'required|date',
            'completion_date' => 'nullable|date|after_or_equal:execution_approval_date',
            'start_date_execution_phase' => 'nullable|date',
            'project_duration_in_months' => 'required|integer|min:0',
            'reporting_frequency' => 'required|integer|min:1',
            'general_objective' => 'required|string|max:1000',
        ];
    }

    /**
     * Maneja el comportamiento en caso de validación fallida.
     *
     * Lanza una excepción HttpResponseException con una respuesta JSON personalizada.
     *
     * @param Validator $validator El validador que indica la falla de validación.
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Error in the required parameters.',
        ], 400));
    }
}
