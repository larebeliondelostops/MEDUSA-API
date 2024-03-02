<?php

namespace App\Http\Request\Viper;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
/**
 * Request personalizado para la validación de datos de Pruebas.
 *
 * Este FormRequest se utiliza para validar las solicitudes entrantes para la creación y actualización de Pruebas,
 * garantizando que todos los datos necesarios estén presentes y sean correctos antes de que la solicitud llegue al controlador.
 *
 * @package App\Http\Requests\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class ProofRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Reglas de validación que se aplican a la solicitud.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'files.*' => 'required|file',
            'responsible' => 'required|string|max:255',
            'report_id' => 'required|exists:reports,id|integer',
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
            'message' => 'Error en los parametros requeridos.',
            'details' => $validator->errors()
        ], 400));
    }
}
