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
            'entidades' => 'required',
            'pacientes_urgencia' => 'required',
            'camas_urgencias_disponibles' => 'required|integer|min:0',
            'salas_cirugias_disponibles' => 'required|integer|min:0',
            'unidad_intensivos_disponibles' => 'required|integer|min:0',
            'camas_primer_nivel' => 'required|integer|min:0',
            'camas_segundo_nivel' => 'required|integer|min:0',
            'camas_tercer_nivel' => 'required|integer|min:0',
            'banco_sangre' => 'required|boolean',
            'medicos_en_turno' => 'required|integer|min:0',
            'enfermeras_en_turno' => 'required|integer|min:0',
            'ips_afiliada' => 'required',
            'cantidad_urgencias_dia' => 'required|integer|min:0'
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
            'entidades' => 'Entidades',
            'pacientes_urgencia' => 'Pacientes en Urgencia',
            'camas_urgencias_disponibles' => 'Camas de urgencias disponibles',
            'salas_cirugias_disponibles' => 'Salas de cirugias disponibles',
            'unidad_intensivos_disponibles' => 'Unidades de cuidados intensivos disponibles',
            'camas_primer_nivel' => 'Cama de primer nivel',
            'camas_segundo_nivel' => 'Camas de segundo nivel',
            'camas_tercer_nivel' => 'Camas de tercer nivel',
            'banco_sangre' => 'Banco de sangre',
            'medicos_en_turno' => 'Medicos en turno',
            'enfermeras_en_turno' => 'Enfermeras en turno',
            'ips_afiliada' => 'IPS afiliada',
            'cantidad_urgencias_dia' => 'Cantidad de urgencias en el dia'
        ];
    }

}
