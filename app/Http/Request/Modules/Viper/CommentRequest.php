<?php

namespace App\Http\Request\Modules\Viper;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

class CommentRequest extends FormRequest
{
    private static array $rules = [
        "POST"=> [
            "create" => [
                'content' => 'required|string|max:1024',
                'progress_id' => 'required|integer|exists:progresses,id',
            ],
        ],
        "PUT" => [
            "update" => [
                'content' => 'required|string|max:1024',
                'progress_id' => 'nullable|integer',
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
