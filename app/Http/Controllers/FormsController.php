<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class FormsController extends Controller
{
    public function user()
    {
        $userData = Form::with('Fields')->where('module', 1)->orderby('field')->get();

        $fields = $userData->map(function ($data) {
            return $data->fields;
        });

        try{
            return Response::json([
                'status'=> 'succes',
                'message' => 'Solicitud exitosa',
                'data' => $fields
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
}
