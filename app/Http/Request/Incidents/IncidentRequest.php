<?php

namespace App\Http\Request\Incidents;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

/**
 * Validador IncidentRequest.
 *
 * Validador para el guardado de los incidentes basado en la información enviada desde la app movil.
 *
 * @package    Requests
 * @subpackage \Indicents
 * @copyright  2023 Ignicion Informáticas S.A.S.
 * @author     Johan Caicedo <jecg2509@gmail.com>
 * @version    v1.0.0
 */
class IncidentRequest extends FormRequest
{
    /**
     * Objeto Validator.
     *
     * @var object
     */
    public $validator;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validaciones para cada campo contenido en el request
     *
     * @return array
     */
    public function rules(): array
    {
        $isUpdate = $this->is('api/v1/incident/update/*');

        return [
            'IndicatorId' => ($isUpdate ? 'sometimes' : 'required') . '|exists:indicators,id|integer',
            'address' => 'nullable|string',
            'description' => ($isUpdate ? 'sometimes' : 'required') . '|string',
            'pointCoordinates' => $isUpdate ? 'sometimes' : 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Mensajes para las validaciones especificas de cada uno de los campos
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'El campo :attribute es requerido',
            'exists' => 'El :attribute no existe en el sistema',
            'integer' => 'El valor del id de usuario debe ser de tipo entero',
            'string' => 'El campo :attribute debe ser de tipo carácter',
            'image' => 'El campo :attribute debe ser de tipo imagen',
            'mimes' => 'El campo :attribute debe ser de tipo jpeg, png, jpg, gif',
            'max' => 'El campo :attribute debe ser de máximo 2048 bytes',
        ];
    }

    /**
     * Asignación de alias para cada campo entrante en el request
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'IndicatorId' => 'Indicador',
            'address' => 'Dirección',
            'description' => 'Descripción',
            'pointCoordinates' => 'Coordenadas',
            'image' => 'Imagen',
        ];
    }

    /**
     * Manejar un intento de validación fallido.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function failedValidation(Validator $validator) : void
    {
        $this->validator = $validator;
    }
}
