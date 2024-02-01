<?php

namespace App\Http\Request\Viper;

use Dotenv\Exception\ValidationException;
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
class DeliverableRequest extends FormRequest
{
    private static array $rules = [
        "POST"=> [
            "create" => [
                'name' => 'required|string|max:256',
                'number' => 'required|integer',
                'product_id' => 'required|integer',
                'deliverable_id' => 'nullable|integer',
            ],
            "create-multiple" => [
                'deliverables' => 'required|array',
            ],
            "create-multiple-config" => [
                'name' => 'required|string|max:256',
                'number' => 'required|integer',
                'product_id' => 'required|integer',
                'deliverables' => 'nullable|array|present',
            ]
        ],
        "PUT" => [
            "update" => [
                'name' => 'required|string|max:256',
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
        $this->lastSlugPath = Arr::last(explode('/', $this->path()));
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

    public function withValidator(Validator $validator)
    {
        if ($this->isMethod('POST') && $this->lastSlugPath == 'create-multiple')
        {
            $data = $this->all();
            if (!array_key_exists('deliverables', $data)) $this->failedValidation($validator);
            $this->validateDeliverables( // valida la informacion contenida en el array
                $data['deliverables'], // array no vacio con datos
            );
        }
    }

    protected function validateDeliverables(array $deliverables)
    {
        foreach ($deliverables as $deliverable) {
            try
            {
                $validator = \Illuminate\Support\Facades\Validator::make(
                    $deliverable,
                    self::$rules['POST']['create-multiple-config']
                );

                $validator->validate();

                if (count($deliverable['deliverables'])>0)
                    $this->validateDeliverables($deliverable['deliverables']);
            }
            catch(\Illuminate\Validation\ValidationException $exception)
            {
                $this->failedValidation($validator);
            }
        }
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
