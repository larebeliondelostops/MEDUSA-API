<?php

namespace App\Http\Request\RolesPermisos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

/**
 * Validador AssignPermissionsRequest.
 *
 * Validador para el método assignPermissions de Roles y Permisos
 *
 * @package    Requests
 * @subpackage \RolesPermisos
 * @copyright  2023 Ignicion Informáticas S.A.S.
 * @author     Johan Caicedo <jecg2509@gmail.com>
 * @version    v1.0.0
 */
class AssignPermissionsRequest extends FormRequest
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
    public function rules() : array
    {
        return [
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'required|array|exists:permissions,name'
        ];
    }

    /**
     * Mensajes para las validaciones especificas de cada uno de los campos
     *
     * @return array
     */
    public function messages() : array
    {
        return [
            'required' => 'El campo :attribute es obligatorio',
            'exists' => 'El :attribute no está registrado en el sistema',
        ];
    }

    /**
     * Asignación de alias para cada campo entrante en el request
     *
     * @return array
     */
    public function attributes() : array
    {
        return [
            'role_id' => 'ID del rol',
            'permissions' => 'Permisos',
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
