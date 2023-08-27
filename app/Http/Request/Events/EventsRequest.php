<?php

namespace App\Http\Request\Events;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class EventsRequest extends FormRequest
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
        return [
            'idEventType' => 'required',
            'name' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'capacity' => 'required|integer|min:1',
            'place' => 'required',
            'authorizingEntity' => 'required',
            'pointCoordinates' => 'required'
        ];
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
            'min' => 'El campo :attribute debe contener un valor mayor a 0',
            'boolean' => 'El campo :attribute debe ser de tipo booleano',
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
            'idEventType' => 'Tipo de evento',
            'name' => 'Nombre del enveto',
            'startDate' => 'Fecha de inicio del evento',
            'endDate' => 'Fecha de finalización del evento',
            'capacity' => 'Capacidad de personas del evento',
            'place' => 'Lugar del evento',
            'authorizingEntity' => 'Entidad autorizadora',
            'pointCoordinates' => 'Punto de coordenadas del evento'
        ];
    }

    /**
     * Manejar un intento de validación fallido.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function failedValidation(Validator $validator): void
    {
        $this->validator = $validator;
    }
}
