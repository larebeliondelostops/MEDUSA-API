<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Imports\HurtoVehiculo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;

class ImportExcelController extends Controller
{
    /**
     * Errores
     */
    private $errores;

    /**
     * Contenido
     */
    private $data;

    /**
     * Tabla a rellenar
     */
    private $tabla = 'hurtos_vehiculos';

    /**
     * Columnas de la tabla en cuestión
     */
    private $columnas = [];

    /**
     * Contador de la cantidad de registros
     */
    private $contador = 0;

    /**
     * Información para el .txt a copiar
     */
    private $data_copy;

    /**
     * Constructor de la clase.
     *
     * @access public
     */
    public function __construct()
    {
    }

    /**
     * Método para realizar la importación de archivos Excel los cuales contienen información acerca de hurtos
     *
     * @access public
     * @param Request $request
     */
    public function import(Request $request)
    {
        try {
            // Declaración de memoria y máximo tiempo de ejecución
            ini_set('memory_limit', '4G');
            ini_set('max_execution_time', 10000);

            // Generamos la importación
            Excel::import(new HurtoVehiculo(), $request->file('file'));
            // Extraemos los errores
            $this->errores = HurtoVehiculo::$IMPORT_RESPONSE;
            // Extraemos la información sin errores
            $this->data = HurtoVehiculo::$FILE_DATA;
            
            if ($this->errores != NULL) {
                return Response::json([
                    'code' => '2002',
                    'status' => 'error',
                    'message' => 'El Archivoo contiene errores',
                    'errors' => $this->errores
                ], 400, [], JSON_PRETTY_PRINT);
            } else {
                $this->getColumnas($this->tabla)->generarTxt()->getDataCopy()->generarCopyTxt()->generarCopiado();
            }

            return Response::json([
                'status' => 'success',
                'respuesta' => 'La solicitud ha sido procesada con exito',
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Generamos el .txt
     *
     * @access public
     */
    public function generarTxt()
    {
        File::put(storage_path('app/public/hurtos/json/') . date('Y-m-d-H-i-s') . '.txt', json_encode($this->data));

        return $this;
    }

    /**
     * Obtener las columnas de la tabla a realizar el copy
     *
     * @access public
     * @param string $tabla
     */
    public function getColumnas($tabla)
    {
        $this->columnas = DB::select("SELECT column_name, ordinal_position
                FROM information_schema.columns
                WHERE table_name = '$tabla'
                ORDER BY ordinal_position"
        );

        return $this;
    }

    /**
     * Recorre el array del JSON descomprimido para armar los datos que se van a ingresar en el archivo .txt
     *
     * @access public
     */
    public function getDataCopy()
    {
        foreach ($this->data["HURTOS"] as $rows) {
            $this->contador++;
            // Guarda el consecutivo
            $this->data_copy .= $this->contador;
            // Busca las columnas de la tabla y las compara con los datos del JSON
            foreach ($this->columnas as $columa) {
                // Comprueba que las columnas que no sean 'id'
                if ($columa->column_name != 'id') {
                    // Comprueba si el JSON tiene la columna buscada
                    // Si no, agrega un \N = NULL
                    if (array_key_exists(strtoupper($columa->column_name), $rows)) {
                        $this->data_copy .= "\t" . str_replace(["\n", "\t", "\r", "\""], " ", trim($rows[strtoupper($columa->column_name)]));
                    } else {
                        $this->data_copy .= "\t\N";
                    }
                }
            }
            $this->data_copy .= "\n";
        }

        return $this;
    }

    /**
     * Crea el archivo .txt con los datos generados
     *
     * @access public
     */
    public function generarCopyTxt()
    {
        File::put(storage_path('app/public/hurtos/copiable/') . date('Y-m-d-H-i-s') . '.txt', $this->data_copy);

        return $this;
    }

    /**
     * Copiado en la base de datos
     *
     * @access public
     */
    public function generarCopiado()
    {
        $variableEntorno = "PGPASSWORD=" . env('DB_PASSWORD') . " psql -h " . env('DB_HOST') . " -U " . env('DB_USERNAME') . " -p " . env('DB_PORT') . " " . env('DB_DATABASE') . " -c";
        $queri1 = "\copy " . $this->tabla . " FROM ";
        $queri2 = base_path('storage/app/public/hurtos/copiable/' . date('Y-m-d-H-i-s') . '.txt');
        $output = str_replace("\\/", "/", $queri2);
        $guardado = $variableEntorno . ' "' . $queri1 . $output . '"';
        exec($guardado);

        return $this;
    }
}
