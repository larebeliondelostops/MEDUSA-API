<?php

namespace App\Http\Request\AvlHistory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AvlHistoryRequest extends FormRequest
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
    // Schema::create('avl_history', function (Blueprint $table) {
    //     $table->id();
    //     $table->string('uuid')->unique();
    //     $table->string('nombre_uniformado')->nullable();
    //     $table->string('imei')->nullable();
    //     $table->timestamp('fecha_movil')->nullable();
    //     $table->timestamp('fecha_gps')->nullable();
    //     $table->string('latitud')->nullable();
    //     $table->string('longitud')->nullable();
    //     $table->string('precision')->nullable();
    //     $table->timestamps();
    // });
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nombre_uniformado' => 'required',
            'imei' => 'required',
            'fecha_movil' => 'required',
            'fecha_gps' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'precision' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido',
        ];
    }
}