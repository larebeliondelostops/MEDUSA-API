<?php

namespace App\Http\Requests\Tenant\Users;

use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

/**
 * Validador AssignRolRequest.
 *
 * Validador para el método de asignación de roles para los usuarios.
 *
 * @package    Requests
 * @subpackage \Users
 * @copyright  2023 Ignicion Informáticas S.A.S.
 * @author     Johan Caicedo <jecg2509@gmail.com>
 * @version    v1.0.0
 */
class AssignRolRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id|integer',
            'rol_name' => 'required|string|min:5|max:25',
        ];
    
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules = [
                'user_id' => 'integer',
                'rol_name' => 'string|min:5|max:25',
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
            'exists' => 'El :attribute no existe en el sistema',
            'integer' => 'El valor del id de usuario debe ser de tipo entero',
            'string' => 'El campo :attribute debe ser de tipo carácter',
            'min' => 'El campo :attribute debe contener al menos 5 letras',
            'max' => 'El campo :attribute debe contener máximo 25 caracteres'
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
            'user_id' => 'ID de usuario',
            'rol_name' => 'Nombre del Rol',
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
