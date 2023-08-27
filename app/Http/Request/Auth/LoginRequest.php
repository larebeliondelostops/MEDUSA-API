<?php

namespace App\Http\Request\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

/**
 * Validador LoginRequest.
 *
 * Validador para el método de login de usuarios
 *
 * @package    Requests
 * @subpackage \Auth
 * @copyright  2023 Ignicion Informáticas S.A.S.
 * @author     Johan Caicedo <jecg2509@gmail.com>
 * @version    v1.0.0
 */
class LoginRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
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
            'required' => 'El campo :attribute es requerido',
            'email' => 'El :attribute debe ser de tipo email',
            'exists' => 'El correo no se encuentra registrado en el sistema',
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
            'email' => 'Email',
            'password' => 'Contraseña',
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
