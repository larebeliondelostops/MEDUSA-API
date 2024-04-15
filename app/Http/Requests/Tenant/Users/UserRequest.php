<?php

namespace App\Http\Requests\Tenant\Users;

use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest
{
    /**
     * Objeto Validator.
     *
     * @var object
     */
    public $validator;
    
    /**
     * Determina si el usuario esta autorizado para hacer esta solicitud.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Validaciones para cada campo contenido en el request
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'email_verified_at' => '',
            'password' => 'required',
            'remember_token' => '',
        ];
    
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules = [
                'name' => '',
                'email' => '',
                'email_verified_at' => '',
                'password' => '',
                'remember_token' => '',
            ];
        }
    
        return $rules;
    }
    /**
     * Mensajes para las validaciones especificas de cada uno de los campos
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido',
        ];
    }

    /**
     * Asignación de alias para cada campo entrante en el request
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'email' => 'Correo',
            'email_verified_at' => '',
            'password' => 'Contraseña',
            'remember_token' => '',

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
