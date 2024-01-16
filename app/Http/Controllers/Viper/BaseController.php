<?php

namespace App\Http\Controllers\Viper;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use PDOException;

class BaseController extends Controller
{
    protected array $databaseErros = [];

    public function __construct()
    {
        $this->databaseErros = config('Viper.databaseErrors.'.env('DB_CONNECTION'));
    }

    protected function handleException(Exception $exception)
    {
        if($exception instanceof QueryException)
        {
            switch($exception->getCode())
            {
                case $this->databaseErros['unique_violation']:
                    return response()->json([
                        'message' => 'Un elemento con el mismo identificador ya existe.'
                    ], Response::HTTP_CONFLICT);
                    break;
                default:
                    return response()->json([
                        'message' => 'Error procesando la petición.'
                    ], Response::HTTP_INTERNAL_SERVER_ERROR);
                break;
            }
        }
        elseif ($exception instanceof PDOException)
        {
            return response()->json([
                'message' => 'No se pudo establecer una conexión con la base de datos.'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        elseif ($exception instanceof ValidationException)
        {
            return response()->json([
                'message' => $exception->getMessage()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        elseif ($exception instanceof ModelNotFoundException)
        {
            return response()->json([
                'message' => 'Recurso no encontrado.'
            ], Response::HTTP_NOT_FOUND);
        }
        elseif ($exception instanceof AuthorizationException)
        {
            return response()->json([
                'message' => 'Acción no autorizada.'
            ], Response::HTTP_FORBIDDEN);
        }
        else
        {
            return response()->json([
                'message' => 'Se produjo un error interno del servidor.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
