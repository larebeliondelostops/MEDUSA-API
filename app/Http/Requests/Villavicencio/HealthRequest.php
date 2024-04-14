<?php

namespace App\Http\Requests\Villavicencio;

use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class HealthRequest  extends FormRequest
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
            'name'=> 'required|string',
            'address'=> 'required|string',
            'position' => 'required|array',
            'emergency_patients'=> 'required|integer|min:0',
            'emergency_beds_available'=> 'required|integer|min:0',
            'available_operating_rooms'=> 'required|integer|min:0',
            'intensive_care_unit_available'=> 'required|integer|min:0',
            'first_level_beds'=> 'required|integer|min:0',
            'second_level_beds'=> 'required|integer|min:0',
            'third_level_beds'=> 'required|integer|min:0',  
            'blood_bank'=> 'required|boolean',
            'doctors_in_the_shift'=> 'required|integer|min:0',
            'nurses_in_the_shift'=> 'required|integer|min:0',
            'affiliated_ips'=> 'required|string',
            'number_of_emergencies_day'=> 'required|integer|min:0',
        ];
    
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules = [
                'name'=> 'string',
                'address'=> 'string',
                'position' => 'array',
                'emergency_patients'=> 'integer|min:0',
                'emergency_beds_available'=> 'integer|min:0',
                'available_operating_rooms'=> 'integer|min:0',
                'intensive_care_unit_available'=> 'integer|min:0',
                'first_level_beds'=> 'integer|min:0',
                'second_level_beds'=> 'integer|min:0',
                'third_level_beds'=> 'integer|min:0',  
                'blood_bank'=> 'boolean',
                'doctors_in_the_shift'=> 'integer|min:0',
                'nurses_in_the_shift'=> 'integer|min:0',
                'affiliated_ips'=> 'string',
                'number_of_emergencies_day'=> 'integer|min:0',
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
            'min' => 'El campo :attribute debe contener un valor mayor a 0',
            'boolean' => 'El campo :attribute debe ser de tipo booleano',
            'string' => 'El campo :attribute debe ser una cadena de texto',
            'integer' => 'El campo :attribute debe ser un número entero',
            'array' => 'El campo :attribute debe ser un array',
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
            'position' => 'Posicion',
            'emergency_patients' => 'Pacientes en Urgencia',
            'emergency_beds_available' => 'Camas de Emergencia Disponibles',
            'available_operating_rooms' => 'Salas de Operaciones Disponibles',
            'intensive_care_unit_available' => 'Unidades de Cuidados Intensivos Disponibles',
            'first_level_beds' => 'Camas de Primer Nivel',
            'second_level_beds' => 'Camas de Segundo Nivel',
            'third_level_beds' => 'Camas de Tercer Nivel',
            'blood_bank' => 'Banco de Sangre',
            'doctors_in_the_shift' => 'Doctores en el Turno',
            'nurses_in_the_shift' => 'Enfermeras en el Turno',
            'affiliated_ips' => 'IPS Afiliadas',
            'number_of_emergencies_day' => 'Número de Emergencias por Día',
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