<?php

namespace App\Http\Request\Modules\Viper;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ActivityRequest extends FormRequest
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
            'description' => 'required|string|max:255',
            'number' => 'numeric|nullable',
            'total_quantity' => 'required|numeric',
            'optimistic_time' => 'required|numeric',
            'most_likely_time' => 'required|numeric',
            'pessimistic_time' => 'required|numeric',
            'estimated_time' => 'numeric|nullable',
            'total_value' => 'required|numeric',
            'in_kind_contribution' => 'required|boolean',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'deliverable_id' => 'required|exists:deliverables,id',
            // 'folder_id' => 'required|exists:folders,id',
            'measurement_unit_id' => 'required|exists:measurement_units,id',
            'report_id' => 'numeric|exists:reports,id',
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
