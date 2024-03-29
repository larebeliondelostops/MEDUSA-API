<?php

namespace App\Http\Request\Modules\Viper;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


/**
 * Request personalizado para la validación de Carpetas.
 *
 * @package    App\Http\Request\Viper
 * @author     Daniel Alferez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class DocumentRequest extends FormRequest
{
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
     * Reglas de validación que se aplicarán a la solicitud.
     *
     * @return array Reglas de validación.
     */
    public function rules()
    {
        return [
            'files.*' => 'required|file',
<<<<<<< HEAD
            'project_id' => 'required|integer',
            'folder_id' => 'required|string',
=======
            'project_id' => 'required|exists:projects,bpin|string',
            'folder_id' => 'required|exists:folders,id|integer',
            'responsible' => 'required|integer',
>>>>>>> fb7e594f048f32c0a99abafee5b0d7bc6da3b35b
        ];
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
        ], 400));
    }
}
