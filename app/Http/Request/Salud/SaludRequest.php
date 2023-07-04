<?php

namespace Ica\Http\Requests\Salud;

use Illuminate\Foundation\Http\FormRequest;

class SaludRequest extends FormRequest
{
    public $validator;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Funcion para convertir de string a entero y poder validar el contenido de determinado dato
     */
    /* public function prepareForValidation()
    {
        $this->merge([
            'tacargo' => intval(str_replace('.', '', $this->input('tacargo')))
        ]);
    } */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'direccion' => 'required',
            'municipio' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'radio' => 'required',
            'anioGravable' => 'required',
            'periodo' => 'required',
            'tipoDeclaracion' => 'required',
            'fechaVencimiento' => 'required',
            'formaPago' => 'required',
            'firmantes' => 'required|min:1',
            'tacargo' => 'required|integer|min:2'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido',
            'min' => 'El campo :attribute debe contener un valor mayor a 0',
        ];
    }

    public function attributes()
    {
        return [
            'direccion' => 'Dirección de Notificación',
            'municipio' => 'Municipio del Contribuyente',
            'telefono' => 'Teléfono',
            'correo' => 'Correo electrónico',
            'radio' => 'Calidad de Declarante',
            'anioGravable' => 'Año Gravable',
            'periodo' => 'Mes',
            'tipoDeclaracion' => 'Tipo de Declaración',
            'formaPago' => 'Forma de Pago',
            'firmantes' => 'Seleccionar firmantes',
            'tacargo' => 'TOTAL A CARGO'
        ];
    }

}
