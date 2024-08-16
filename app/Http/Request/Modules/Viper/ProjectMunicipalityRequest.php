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
class ProjectMunicipalityRequest extends FormRequest
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
        $rules = [
            'municipalities' => 'required|array',
                'municipalities.*.municipality_id' => 'required|integer',
                'municipalities.*.project_bpin' => 'required|integer',
        ];

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
