<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class MobileDeviceRequest extends FormRequest
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
    public function authorize()
    {
        return true; // Puedes personalizar la lógica de autorización si es necesario
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'device_token' => 'required',
            'is_active' => 'boolean', // Ajusta según tus necesidades
            //campo para username
            'username' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'device_token.required' => 'El campo device_token es obligatorio.',
            'is_active.boolean' => 'El campo is_active debe ser un valor booleano.',
            'username.required' => 'El campo username es obligatorio.',
        ];
    }
}
