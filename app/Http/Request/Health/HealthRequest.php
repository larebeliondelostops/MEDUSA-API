<?php

namespace App\Http\Request\Health;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class HealthRequest extends FormRequest
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
            'idEntities' => 'required',
            'emergencyPatients' => 'required',
            'emergencyBedsAvailable' => 'required|integer|min:0',
            'availableOperatingRooms' => 'required|integer|min:0',
            'intensiveCareUnitAvailable' => 'required|integer|min:0',
            'firstLevelBeds' => 'required|integer|min:0',
            'secondLevelBeds' => 'required|integer|min:0',
            'thirdLevelBeds' => 'required|integer|min:0',
            'bloodBank' => 'required|boolean',
            'doctorsInTheShift' => 'required|integer|min:0',
            'nursesInTheShift' => 'required|integer|min:0',
            'affiliatedIps' => 'required',
            'numberOfEmergenciesDay' => 'required|integer|min:0'
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
            'idEntities' => 'Entidades',
            'emergencyPatients' => 'Pacientes en Urgencia',
            'emergencyBedsAvailable' => 'Camas de urgencias disponibles',
            'availableOperatingRooms' => 'Salas de cirugias disponibles',
            'intensiveCareUnitAvailable' => 'Unidades de cuidados intensivos disponibles',
            'firstLevelBeds' => 'Cama de primer nivel',
            'secondLevelBeds' => 'Camas de segundo nivel',
            'thirdLevelBeds' => 'Camas de tercer nivel',
            'bloodBank' => 'Banco de sangre',
            'doctorsInTheShift' => 'Medicos en turno',
            'nursesInTheShift' => 'Enfermeras en turno',
            'affiliatedIps' => 'IPS afiliada',
            'numberOfEmergenciesDay' => 'Cantidad de urgencias en el dia'
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
