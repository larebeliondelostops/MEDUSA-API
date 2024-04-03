<?php

namespace App\Http\Requests\Tenant\Users;

use Exception;
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
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'role_id' => 'required|exists:roles,id',
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string',
            'avatar' => 'nullable|file',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ];
    
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules = [
                'name' => 'string',
                'email' => 'email',
                'role_id' => 'exists:roles,id',
                'phone_number' => 'string',
                'address' => 'string',
                'avatar' => 'file',
                'password' => 'min:8',
                'password_confirmation' => 'same:password',
            ];
        } 
        return $rules;
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
    protected function failedValidation(Validator $validator)
    {
        $keys = $validator->errors()->keys();
        $errors = $validator->errors()->first($keys[0]);
        unset($keys[0]);

        foreach ($keys as $key) {
            $errors .= ", " .$validator->errors()->first($key);
        }

        throw new Exception($errors, 400);
    }
}
