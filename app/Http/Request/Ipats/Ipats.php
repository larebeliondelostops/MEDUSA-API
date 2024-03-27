<?php

namespace App\Http\Request\Ipats;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class Ipats extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id_agent' => 'required|string',
            'id_ipat' => 'required|string',
            'injured' => 'required|string',
            'victims' => 'required|string',
            'coordinates' => 'required|string',
            'date_ipat' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'id_agent.required' => 'El campo id_agent es obligatorio.',
            'id_ipat.required' => 'El campo id_ipat es obligatorio.',
            'injured.required' => 'El campo injured es obligatorio.',
            'victims.required' => 'El campo victims es obligatorio.',
            'coordinates.required' => 'El campo position es obligatorio.',
            'date_ipat.required' => 'El campo date_ipat es obligatorio.',
        ];
    }
}