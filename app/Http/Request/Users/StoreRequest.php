<?php

namespace App\Http\Request\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

/**
 * Validador StoreRequest.
 *
 * Validador para el método de registro de usuarios
 *
 * @package    Requests
 * @subpackage \Auth
 * @copyright  2023 Ignicion Informáticas S.A.S.
 * @author     Johan Caicedo <jecg2509@gmail.com>
 * @version    v1.0.0
 */
class StoreRequest extends FormRequest
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
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'role_id' => 'required|exists:roles,id',
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string',
            'avatar' => 'nullable|file',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
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
            'string' => 'El campo :attribute debe ser de tipo carácter',
            'email' => 'El :attribute debe ser de tipo email',
            'unique' => 'El correo ingresado ya existe en el sistema',
            'min' => 'El campo :attribute debe contener al menos 8 letras',
            'same' => 'El campo :attribute debe ser el mismo que el campo :other'
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
            'name' => 'Nombre',
            'email' => 'Email',
            'role_id' => 'Rol',
            'phone_number' => 'Número de teléfono',
            'address' => 'Dirección',
            'avatar' => 'Avatar',
            'password' => 'Contraseña',
            'password_confirmation' => 'Confirmación de contraseña',
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
