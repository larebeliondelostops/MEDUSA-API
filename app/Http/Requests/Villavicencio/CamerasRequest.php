<?php

namespace App\Http\Requests\Villavicencio;

use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CamerasRequest extends FormRequest
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
            'name' => 'required|string',
            'address' => 'required|string',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'url' => 'required|text',
        ];
    
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules = [
                'name' => 'string',
                'address' => 'string',
                'longitude' => 'string',
                'latitude' => 'string',
                'url' => 'text',
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
            'string' => 'El campo :attribute debe ser una cadena de texto',
            'integer' => 'El campo :attribute debe ser un número entero',
            'size' => 'El campo :attribute debe tener :size elementos',
            'text' => 'El campo :attribute debe ser un texto',
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
            'address' => 'Dirección',
            'longitude' => 'Longitud',
            'latitude' => 'Latitud',
            'url' => 'URL',
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