<?php

namespace App\Http\Request\Modules\Viper;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectContractRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'rol' => 'required|max:255',
            'bpin' => 'required|string|max:255',
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
