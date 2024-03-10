<?php

namespace App\Http\Request\Modules\Viper;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;


/**
 * Request personalizado para la validación de entregables.
 *
 * Este FormRequest se utiliza para validar las solicitudes entrantes para la creación y actualización de entregables,
 * garantizando que todos los datos necesarios estén presentes y sean correctos antes de que la solicitud
 * llegue al controlador.
 * @package    App\Http\Request\Viper
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class LocationRequest extends FormRequest
{
    private static array $rules = [
        "POST"=> [
            "create" => [
                'name' => 'required|string|max:64',
                'project_bpin' => 'required|string|max:255',

                'coordinate' => 'required|array',
                'coordinate.type'=> 'required|string|max:32',
                'coordinate.latitude'=> 'required|numeric',
                'coordinate.longitude'=> 'required|numeric',

                'department_id' => 'required|integer',
                'municipality_id' => 'required|integer',
            ],
        ],
        "PUT" => [
            "update" => [
                'name' => 'required|string|max:64',
                'project_bpin' => 'required|string|max:255',

                'coordinate' => 'required|array',
                'coordinate.type'=> 'required|string|max:32',
                'coordinate.latitude'=> 'required|numeric',
                'coordinate.longitude'=> 'required|numeric',

                'department_id' => 'required|integer',
                'municipality_id' => 'required|integer',
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
            'message' => 'Error in the required parameters.'
        ], 400));
    }
}
