<?php

namespace App\Http\Controllers;

use App\Models\EventType;
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
     * Variable para almacenar el objeto del modulo
     */
    private $module;

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
     * Método para devolver el formulario para registro de alarmas
     *
     * @access public
     */
    public function event()
    {
        $event_data = Form::with('Fields')->where('module', 2)->orderby('field')->get();

        $fields = $event_data->map(function ($data) {
            if ($data->fields->type == 4) {
                if ($data->fields->key == 'eventType') {
                    $eventType = EventType::select('id as value', 'eventName as label')->get();
                    $data->fields->options = $eventType;
                }
            }
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

    public function edit($module)
    {
        try{

            $this->module = Module::find($module);

            if (!isset($this->module->id)) {
                throw new Exception('El modulo no existe');
            }

            $fields = Form::with('Fields')->where('module', $this->module->id)->orderby('field')->get();

            $fields = $fields->map(function ($data) {
                $campo = [
                    'name' => $data->Fields->name,
                    'placeholder' => $data->Fields->placeholder,
                    'key' => $data->Fields->key,
                    'type' => $data->Fields->type,
                    'required' => $data->Fields->required,
                    'schema' =>  $data->Fields->schema
                ];
                return $campo;
            });

            return Response::json([
                'status'=> 'succes',
                'message' => 'Solicitud exitosa',
                'module' => $this->module->name,
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

    public function store(Request $request)
    {
        try{

            $formulario_entrante = $request->form;

            $this->module = Module::find($request->module);

            if (!isset($this->module->id)) {
                throw new Exception('El modulo no existe');
            }

            $campos_actuales = Field::all();

            Form::where('module', $request->module)->delete();

            foreach ($formulario_entrante as $campo_nuevo) {
                // Validar su existencia respecto de los existentes
                $this->validateExisteField($campo_nuevo, $campos_actuales);
                // Vincular el campo con el formulario y modulo
                $this->vinculateField($campo_nuevo);
            }

            return Response::json([
                'status'=> 'succes',
                'message' => 'Solicitud exitosa',
                //'data' => $fields
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

    public function validateExisteField($campo_nuevo, $campos_actuales)
    {
        $bandera = false;

        foreach($campos_actuales as $campo_actual) {
            // Transformart el objeto a array
            $campo_actual = $campo_actual->toArray();
            // Eliminar el id del array
            unset($campo_actual['id']);

            $difference = array_diff_assoc($campo_actual, $campo_nuevo);

            if (empty($difference)) {
                $bandera = true;
            }
        }

        if ($bandera == false) {
            //  Crear el nuevo campo
            Field::create([
                'name' => $campo_nuevo['name'],
                'placeholder' => $campo_nuevo['placeholder'],
                'key' => $campo_nuevo['key'],
                'type' => $campo_nuevo['type'],
                'required' => $campo_nuevo['required'],
                'schema' => $campo_nuevo['schema'],
            ]);
        }
    }

    public function vinculateField($campo_nuevo)
    {
        $field = Field::where('name', $campo_nuevo['name'])
            ->where('placeholder', $campo_nuevo['placeholder'])
            ->where('key', $campo_nuevo['key'])
            ->where('type', $campo_nuevo['type'])
            ->where('required', $campo_nuevo['required'])
            ->where('schema', $campo_nuevo['schema'])
            ->first();

        Form::create([
            'module' => $this->module->id,
            'field' => $field->id
        ]);
    }
}
