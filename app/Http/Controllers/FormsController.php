<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Form;
use App\Models\Field;
use App\Models\Module;
use App\Models\Slug;
use App\Support\TenantLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;

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

    public function getForm($slug)
    {
        try{
            $slugName = $slug;
            $slug = Slug::where('name', $slugName)->first();
            if (! $slug) {
                return Response::json([
                    'status' => 'error',
                    'message' => TenantLanguage::text("El slug {$slugName} no existe", "The slug {$slugName} does not exist"),
                ], 404, [], JSON_PRETTY_PRINT);
            }

            $module = Module::where('slug', $slug->id)->first();
            if (! $module) {
                return Response::json([
                    'status' => 'error',
                    'message' => TenantLanguage::text("No existe un modulo asociado al slug {$slugName}", "There is no module associated with slug {$slugName}"),
                    'data' => ['slug_id' => $slug->id, 'slug' => $slugName],
                ], 404, [], JSON_PRETTY_PRINT);
            }

            $form = Form::with('Fields')->where('module', $module->id)->orderBy('id')->get();

            $fields = $form->map(function ($data) {
                $field = $data->Fields;
                if (! $field) {
                    return null;
                }

                if ($field->type == 4) {
                    $modelSelect = $field->model_select;
                    $field->options = [];

                    if ($modelSelect && class_exists($modelSelect)) {
                        $model = new $modelSelect();
                        $labelColumn = Schema::hasColumn($model->getTable(), 'value') ? 'value' : 'name';
                        $columns = ['id as value', $labelColumn . ' as label'];

                        if (Schema::hasColumn($model->getTable(), 'parent_indicator_id')) {
                            $columns[] = 'parent_indicator_id';
                        }

                        $field->options = $modelSelect::select($columns)->orderBy('id')->get()->map(function ($option) use ($modelSelect) {
                            $option->label = TenantLanguage::optionLabel($modelSelect, $option->label);

                            return $option;
                        });
                    }
                }

                $field->name = TenantLanguage::fieldName($field->name, $field->key);
                $field->placeholder = TenantLanguage::fieldPlaceholder($field->placeholder, $field->key);

                return $field;
            })->filter()->values();

            return Response::json([
                'status'=> 'succes',
                'message' => TenantLanguage::text('Solicitud exitosa', 'Request completed successfully'),
                'data' => $fields
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'status' => 'error',
                'message' => TenantLanguage::text('Error En La Generacion De La Solicitud', 'Error generating the request')
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
        try{
            $modules = Module::select('id as ID', 'name')->orderby('id')->get();

            return Response::json([
                'status'=> 'succes',
                'message' => 'Solicitud exitosa',
                'data' => $modules
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
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
        try{
            $fields = Field::orderby('id')->get();

            return Response::json([
                'status'=> 'succes',
                'message' => 'Solicitud exitosa',
                'data' => $fields
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
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
                    'schema' =>  $data->Fields->schema,
                    'model_select' => $data->Fields->model_select
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
                'model_select' => $campo_nuevo['options'] ?? null
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
            ->where('model_select', $campo_nuevo['options'] ?? null)
            ->first();

        Form::create([
            'module' => $this->module->id,
            'field' => $field->id
        ]);
    }
}
