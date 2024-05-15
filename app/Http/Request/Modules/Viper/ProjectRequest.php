<?php

namespace App\Http\Request\Modules\Viper;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Auth\Access\AuthorizationException;


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
        return auth()->check();
    }

    /**
     * Reglas de validación que se aplicarán a la solicitud.
     *
     * @return array Reglas de validación.
     */
    public function rules()
    {   
        $parts = explode('/', $this->route()->uri());
        $endpoint = end($parts);
        $method = $this->method();
        $rules = [
            'bpin' => 'required|string|max:255',
            'name' => 'required|string|max:512',
            'ocad' => 'required|string|max:255',
            'state_id' => 'required|integer',
            'substate_id' => 'required|integer',
            'total_value' => 'required|numeric',    
            'responsible_entity' => 'sometimes|string|max:255',
            'sector_id' => 'required|integer',
            'department_id' => 'required|integer',
            'municipalities' => 'required|array',
                'municipalities.*.municipality_id' => 'required|integer',

            'locations' => 'nullable|array', // array con las locaciones del proyecto
                'locations.*.name' =>'required|string|max:64',
                    'locations.*.coordinate' => 'required|array',
                        'locations.*.coordinate.type' => 'required|string|max:32',
                        'locations.*.coordinate.latitude' => 'required|numeric',
                        'locations.*.coordinate.longitude' => 'required|numeric',
                'locations.*.department_id' => 'required|integer',
                'locations.*.municipality_id' => 'required|integer',

            'beneficiaries' => 'required|integer',
            'planner' => 'required|string|max:255',
            'execution_approval_date' => 'nullable|date',
            'completion_date' => 'nullable|date|after_or_equal:execution_approval_date',
            'start_date_execution_phase' => 'nullable|date',

            'unilateral_termination' => 'nullable|date|after_or_equal:completion_date',
            'bilateral_termination' => 'nullable|date|after_or_equal:unilateral_termination',

            'project_duration_in_months' => 'nullable|integer|min:0',
            'reporting_frequency' => 'nullable|integer|min:1',
        ];
        if ($method=='PUT')
        {
            $rules['locations.*.id'] = 'sometimes|integer';
            return $rules;
        }
        else if ($method == 'POST' && $endpoint==='createFromMga')
            return [];
        else
            return $rules;
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
