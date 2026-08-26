<?php

namespace App\Http\Request\Incidents;

use App\Rules\Subindicator;
use App\Support\TenantLanguage;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Validador IncidentRequest.
 *
 * Validador para el guardado de los incidentes basado en la información enviada desde la app móvil.
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

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->is('api/v1/incident/update/*');

        return [
            'IndicatorId' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                new Subindicator(),
            ],
            'address' => 'nullable|string',
            'description' => ($isUpdate ? 'sometimes' : 'required') . '|string',
            'pointCoordinates' => $isUpdate ? 'sometimes' : 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => TenantLanguage::text('El campo :attribute es requerido', 'The :attribute field is required'),
            'exists' => TenantLanguage::text('El :attribute no existe en el sistema', 'The :attribute does not exist in the system'),
            'integer' => TenantLanguage::text('El valor del id de usuario debe ser de tipo entero', 'The user id value must be an integer'),
            'string' => TenantLanguage::text('El campo :attribute debe ser de tipo carácter', 'The :attribute field must be a string'),
            'image' => TenantLanguage::text('El campo :attribute debe ser de tipo imagen', 'The :attribute field must be an image'),
            'mimes' => TenantLanguage::text('El campo :attribute debe ser de tipo jpeg, png, jpg, gif', 'The :attribute field must be jpeg, png, jpg or gif'),
            'max' => TenantLanguage::text('El campo :attribute debe ser de máximo 2048 bytes', 'The :attribute field must be at most 2048 bytes'),
        ];
    }

    public function attributes(): array
    {
        return [
            'IndicatorId' => TenantLanguage::fieldName('Subcategoria', 'IndicatorId'),
            'address' => TenantLanguage::fieldName('Dirección', 'address'),
            'description' => TenantLanguage::fieldName('Descripción', 'description'),
            'pointCoordinates' => TenantLanguage::fieldName('Coordenadas', 'pointCoordinates'),
            'image' => TenantLanguage::fieldName('Imagen', 'image'),
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        $this->validator = $validator;
    }
}
