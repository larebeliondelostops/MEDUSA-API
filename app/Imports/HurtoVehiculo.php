<?php

namespace app\Imports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToArray;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class HurtoVehiculo implements ToArray, WithStartRow, WithChunkReading, WithMultipleSheets
{
    use Importable;
    public static $IMPORT_RESPONSE = [];
    public static $FILE_DATA;
    public $contadorChunk = 0;

    /**
     * Constuctor de la clase.
     *
     * @access public
     * @param int $request
     */
    public function __construct()
    {
    }

    public function array(array $rows)
    {
        unset($rows[0]);
        $index = $this->contadorChunk;
        self::$FILE_DATA['HURTOS'] = [];
        self::$FILE_DATA['Filas'] = count($rows);
        $data = [];
        $rules = [
            /* '*.0' => ['required'],
            '*.1' => ['required'],
            '*.2' => ['required'],
            '*.3' => ['required'],
            '*.4' => ['required'],
            '*.5' => ['required'],
            '*.6' => ['required'],
            '*.7' => ['required'],
            '*.8' => ['required'],
            '*.9' => ['required'],
            '*.10' => ['required'],
            '*.11' => ['required'],
            '*.12' => ['required'],
            '*.13' => ['required'],
            '*.14' => ['required'],
            '*.15' => ['required'],
            '*.16' => ['required'],
            '*.17' => ['required'],
            '*.18' => ['required'],
            '*.19' => ['required'],
            '*.20' => ['required'],
            '*.21' => ['required'],
            '*.22' => ['required'],
            '*.23' => ['required'],
            '*.24' => ['required'], */
        ];

        foreach ($rows as $row)
        {
            // Se valida que el registro contenga al menos una valor en uno de sus campos para poder ser procesado
            if ( $this->hasValues($row, 24) ){
                $fileRow = [
                    'CABECERA'      => $row[0],
                    'DISTRITO'      => $row[1],
                    'ESTACION'    => $row[2],
                    'CAI'           => $row[3],
                    'CUADRANTE'    => $row[4],
                    'BARRIO'       => $row[5],
                    'CANTIDAD'      => $row[6],
                    'DIRECCION'     => $row[7],
                    'SITIO'         => $row[8],
                    'MES'           => $row[9],
                    'SEMANA'        => $row[10],
                    'FECHA'         => $row[11],
                    'DIA'           => $row[12],
                    'HORA'          => $row[13],
                    'HORA_24'  		=> $row[14],
                    'DELITO'        => $row[15],
                    'CONDUCTA'      => $row[16],
                    'MODALIDAD'     => $row[17],
                    'DESCRIPCION'   => $row[18],
                    'CLASE_BIEN'    => $row[19],
                    'MODELO'        => $row[20],
                    'ZONA'          => $row[21],
                    'NUMERO_UNICO'  => $row[22],
                    'CANTIDAD_2'    => $row[23],
                    'PLACA'         => $row[24]
                ];
                self::$FILE_DATA['HURTOS'][] = $fileRow;
                $data[] = $row;
            }
        }
        $messages = [
            '*.0.required' => 'El campo :attribute es requerido.',
            '*.1.required' => 'El campo :attribute es requerido.',
            '*.2.required' => 'El campo :attribute es requerido.',
            '*.3.required' => 'El campo :attribute es requerido.',
            '*.4.required' => 'El campo :attribute es requerido.',
            '*.5.required' => 'El campo :attribute es requerido.',
            '*.6.required' => 'El campo :attribute es requerido.',
            '*.7.required' => 'El campo :attribute es requerido.',
            '*.8.required' => 'El campo :attribute es requerido.',
            '*.9.required' => 'El campo :attribute es requerido.',
            '*.10.required' => 'El campo :attribute es requerido.',
            '*.11.required' => 'El campo :attribute es requerido.',
            '*.12.required' => 'El campo :attribute es requerido.',
            '*.13.required' => 'El campo :attribute es requerido.',
            '*.14.required' => 'El campo :attribute es requerido.',
            '*.15.required' => 'El campo :attribute es requerido.',
            '*.16.required' => 'El campo :attribute es requerido.',
            '*.17.required' => 'El campo :attribute es requerido.',
            '*.18.required' => 'El campo :attribute es requerido.',
            '*.19.required' => 'El campo :attribute es requerido.',
            '*.20.required' => 'El campo :attribute es requerido.',
            '*.21.required' => 'El campo :attribute es requerido.',
            '*.22.required' => 'El campo :attribute es requerido.',
            '*.23.required' => 'El campo :attribute es requerido.',
            '*.24.required' => 'El campo :attribute es requerido.',
        ];

        $customAttributes = [
            '*.0' => 'Cabecera Mpal Ocurre(Patrimonio)',
            '*.1' => 'D_Distrito(Patrimonio)',
            '*.2' => 'D_Estaciones(Patrimonio)',
            '*.3' => 'D_Cai(Patrimonio)',
            '*.4' => 'D_Cuadrantes(Patrimonio)',
            '*.5' => 'Barrios(Patrimonio)',
            '*.6' => 'Cantidad',
            '*.7' => 'Direccion(Patrimonio)',
            '*.8' => 'Clase de Sitio(Patrimonio)',
            '*.9' => 'Mes(Patrimonio)',
            '*.10' => 'Numero semana(Patrimonio)',
            '*.11' => 'Fecha Hecho(Patrimonio)',
            '*.12' => 'Dia Ocurrio2(Patrimonio)',
            '*.13' => 'Hora(Patrimonio)',
            '*.14' => 'Hora_24(Patrimonio)',
            '*.15' => 'DELITO',
            '*.16' => 'Conductas Especiales(Patrimonio)',
            '*.17' => 'Modalidades(Patrimonio)',
            '*.18' => 'Descripcion Armas Medios',
            '*.19' => 'Clases Bien',
            '*.20' => 'Modelo',
            '*.21' => 'Zona(Patrimonio)',
            '*.22' => 'Nro. Unico(Patrimonio)',
            '*.23' => 'Cantidad 2',
            '*.24' => 'Placa'
        ];

        $validator = Validator::make($data, $rules, $messages, $customAttributes);

        if($validator->fails()) {
            $errors = $validator->errors()->get('*');
            $endFor = count($rows) < 3001 ? count($rows) : 3001;
            $chunkSize = $this->chunkSize() * $index;

            for($i = 0; $i <= $endFor; $i++) {
                $errorsNum = 0;
                $logLine = "Error en la fila " . ($i + $this->startRow() + $chunkSize + 1) . ": ";
                for($j = 0; $j <= 24; $j++) {
                    if(isset($errors["$i.$j"])){
                        $errorsNum++;
                        foreach($errors["$i.$j"] as $message) {
                            $logLine .= " $message";
                        }
                    }
                }
                if($errorsNum != 0) {
                    self::$IMPORT_RESPONSE []= $logLine;
                }
            }

            $this->contadorChunk++;
            return;
        }
        $this->contadorChunk++;
    }


    public function sheets(): array
    {
        return [
            0 => $this,
        ];
    }

    /**
     * Aca definimos la fila donde empezamos a leer el excel.
     * @return int numero de la fila.
     */
    public function startRow(): int
    {
        return 1;
    }

    /**
     * Sirve para leer la hoja de excel en fragmentos. definimos el numero
     * de filas que lee.
     * @return [type] [description]
     */
    public function chunkSize(): int
    {
        return 3001;
    }

    public function hasValue( $value ): bool
    {
        return ( $value != '' && $value != null && $value != ' ');
    }


    public function hasValues( $row, $columns ): bool
    {
        for( $i = 0; $i <= $columns; $i++){
            if( $this->hasValue( $row[$i] ) ){
                return true;
            }
        }
        return false;
    }
}
