<?php

namespace App\Http\Controllers\Viper;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
                        'message' => 'A element with the same identifier already exists.'
                    ], 409);
                    break;
                default:
                    return response()->json([
                        'message' => 'Error proccesing request.'
                    ], 500);
                break;
            }
        }
        elseif ($exception instanceof PDOException)
        {
            return response()->json([
                'message' => 'Failed to establish a connection with the database.'
            ], 500);
        }
        elseif ($exception instanceof ValidationException)
        {
            return response()->json([
                'message' => $exception->getMessage()
            ], 422);
        }
        elseif ($exception instanceof ModelNotFoundException)
        {
            return response()->json([
                'message' => 'Resource not found.'
            ], 404);
        }
        elseif ($exception instanceof AuthorizationException)
        {
            return response()->json([
                'message' => 'Unauthorized action.'
            ], 403);
        }
        else
        {
            return response()->json([
                'message' => 'An internal server error occurred.'
            ], 500);
        }
    }
}
