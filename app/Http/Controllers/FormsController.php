<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Form;
use App\Models\Field;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

/**
 * Controlador Forms.
 *
 * Controlador que maneja la lógica para devolver los formularios dinámicamente
 *
 * @package    Controllers
 * @copyright  2023 Ignicion Games S.A.S.
 * @author     Johan Caicedo <jecg2509@gmail.com>
 * @version    v1.0.0
 */
class FormsController extends Controller
{
    /**
     * Método para devolver el formulario para registro de usuarios
     *
     * @access public
     */
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

    /**
     * Método para devolver el formulario para registro de alarmas
     *
     * @access public
     */
    public function alarm()
    {
        $alarm_data = Form::with('Fields')->where('module', 6)->orderby('field')->get();

        $fields = $alarm_data->map(function ($data) {
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

    public function ambient()
    {
        $alarm_data = Form::with('Fields')->where('module', 4)->orderby('field')->get();

        $fields = $alarm_data->map(function ($data) {
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

    /**
     * Método para devolver el formulario para registro de alarmas
     *
     * @access public
     */
    public function pollingPlace()
    {
        $alarm_data = Form::with('Fields')->where('module', 7)->orderby('field')->get();

        $fields = $alarm_data->map(function ($data) {
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

    /**
     * Servicio para exponer el contenido de la tabla modules
     *
     * @access public
     */
    public function modules()
    {
        $modules = Module::select('id', 'name')->orderby('id')->get();

        try{
            return Response::json([
                'status'=> 'succes',
                'message' => 'Solicitud exitosa',
                'data' => $modules
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

    /**
     * Servicio para exponer el contenido de la tabla fields
     *
     * @access public
     */
    public function fields()
    {
        $fields = Field::orderby('id')->get();

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
