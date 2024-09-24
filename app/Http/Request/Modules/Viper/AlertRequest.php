<?php

namespace App\Http\Request\Modules\Viper;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

/**
 * Request personalizado para la validación de datos de Alertas.
 *
 * Este FormRequest se utiliza para validar las solicitudes entrantes para la creación y actualización de Alertas,
 * garantizando que todos los datos necesarios estén presentes y sean correctos antes de que la solicitud llegue al controlador.
 *
 * @package App\Http\Requests\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class AlertRequest extends FormRequest
{
    private static array $rules = [
        "POST"=> [
            "create" => [
                'name' => 'required|string|max:255',
                'type' => 'required|string|max:100',
                'severity_id' => 'required|integer|exists:alert_severities,id',
                'is_read' => 'boolean',
                'description' => 'required|string',
                'indicator_id' => 'nullable|exists:indicators_viper,id|integer',
                'project_id' => 'required|exists:projects,bpin|string|max:100',
                'improvement_plan_id' => 'nullable|exists:improvement_plans,id|integer',
                'user_email' => 'required|string|exists:users,email',
            ],
        ],
        "PUT" => [
            "update" => [
                'name' => 'nullable|string|max:255',
                'type' => 'nullable|string|max:100',
                'severity_id' => 'nullable|integer|exists:alert_severities,id',
                'is_read' => 'nullable|boolean',
                'description' => 'nullable|string',
                'indicator_id' => 'nullable|xists:indicators_viper,id|integer',
                'project_id' => 'nullable|exists:projects,bpin|string|max:100',
                'improvement_plan_id' => 'nullable|exists:improvement_plans,id|integer',
                'user_email' => 'nullable|string',
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
        return auth()->check();
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
     * Reglas de validación que se aplicarán a la solicitud.
     *
     * @return array Reglas de validación.
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
