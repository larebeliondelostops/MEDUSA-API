<?php

namespace App\Http\Request\Viper;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


/**
 * Request personalizado para la validación de entregables.
 *
 * Este FormRequest se utiliza para validar las solicitudes entrantes para la creación y actualización de entregables,
 * garantizando que todos los datos necesarios estén presentes y sean correctos antes de que la solicitud
 * llegue al controlador.
 * @package    App\Http\Request\Viper
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class DeliverableRequest extends FormRequest
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
        if ($this->isMethod("POST")) {
            return [
                'name' => 'required|string|max:256',
                'product_id' => 'required|integer',
                'deliverable_id' => 'nullable|integer',
            ];
        }
        else if ($this->isMethod('PUT'))
        {
            return [
                'name' => 'required|string|max:256',
            ];
        }
        return [];
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
