<?php

namespace App\Http\Request\Modules\Viper;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

class ProgressRequest extends FormRequest
{   
    private static array $rules = [
        "POST"=> [
            "create" => [
                'week' => 'required|integer',
                'activity_completed' => 'required|string',
                'activity_id' => 'required|integer|exists:activities,id',
                'observations' => 'required|string',
                'summary' => 'required|string',
                'conclusions' => 'required|string',
                'recommendations' => 'required|string',
                'actual_physical_progress' => 'required|numeric|between:0,100',
                'billed_financial_progress' => 'required|numeric',
            ],
        ],
        "PUT" => [
            "update" => [
                'week' => 'nullable|integer',
                'activity_completed' => 'nullable|string',
                'activity_id' => 'nullable|integer|exists:activities,id',
                'observations' => 'nullable|string',
                'summary' => 'nullable|string',
                'conclusions' => 'nullable|string',
                'recommendations' => 'nullable|string',
                'actual_physical_progress' => 'required|numeric|between:0,100',
                'billed_financial_progress' => 'required|numeric',
            ]
        ]
    ];

    public string $lastSlugPath;
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Prepara la instancia antes de la validación.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $path = $this->path();
        if ($this->method() == 'PUT') {
            $segments = explode('/', $path);
            array_pop($segments);
            $path = implode('/', $segments);
        }
        $this->lastSlugPath = Arr::last(explode('/', $path));
    }

    /**
     * Reglas de validación que se aplican a la solicitud.
     *
     * @return array
     */
    public function rules()
    {
        return self::$rules[$this->method()][$this->lastSlugPath];
    }


    /**
     * Maneja el comportamiento en caso de validación fallida.
     *
     * Lanza una excepción HttpResponseException con una respuesta JSON personalizada.
     *
     * @param Validator $validator El validador que indica la falla de validación.
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Error in the required parameters.',
        ], 400));
    }
}
