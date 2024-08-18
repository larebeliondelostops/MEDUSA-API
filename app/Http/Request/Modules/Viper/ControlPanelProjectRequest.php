<?php

namespace App\Http\Request\Modules\Viper;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

class ControlPanelProjectRequest extends FormRequest
{
    private static array $rules = [
        "POST"=> [
            "create" => [
                'control_panel_id' => 'required|integer|exists:control_panel,id',
                'project_id' => 'required|string|max:255|exists:projects,bpin',
                'description' => 'required|string',
            ],
        ],
        "PUT" => [
            "update" => [
                'control_panel_id' => 'nullable|integer|exists:control_panel,id',
                'project_id' => 'nullable|string|max:255|exists:projects,bpin',
                'description' => 'nullable|string',
            ]
        ]
    ];

    public string $lastSlugPath;

    /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
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
            'message' => 'Error en los parametros requeridos.',
            'details' => $validator->errors()
        ], 400));
    }
}
