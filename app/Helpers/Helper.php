<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

/**
 * Class Helper
 * @package App\Helpers
 */
class Helper
{
    /**
     * @var array
     */
    private $unidades = [
        '',
        'UNO ',
        'DOS ',
        'TRES ',
        'CUATRO ',
        'CINCO ',
        'SEIS ',
        'SIETE ',
        'OCHO ',
        'NUEVE ',
        'DIEZ ',
        'ONCE ',
        'DOCE ',
        'TRECE ',
        'CATORCE ',
        'QUINCE ',
        'DIECISÉIS ',
        'DIECISIETE ',
        'DIECIOCHO ',
        'DIECINUEVE ',
        'VEINTE ',
    ];


    /**
     * @var string
     */
    public $conector = 'CON';

    /**
     * @var bool
     */
    public $apocope = false;


    /**
     * Valida si debe aplicarse apócope de uno.
     *
     * @return void
     */
    private function checkApocope()
    {
        if ($this->apocope === true) {
            $this->unidades[1] = 'UN ';
        }
    }

    /**
     * Concatena las partes formateadas del número convertido.
     *
     * @param array $splitNumber
     *
     * @return string
     */
    private function glue($splitNumber)
    {
        return implode(' ' . mb_strtoupper($this->conector, 'UTF-8') . ' ', array_filter($splitNumber));
    }




    public function __construct()
    {
    }

    /**
     * Reemplaza las comas por punto para guardar en BD.
     * @param  string $value [description]
     * @return mixed
     */
    public static function formatearMoneda($value= null)
    {
        return str_replace(',', '.', str_replace('.', '', $value));
    }

    /**
     * Formatea un número con los millares agrupados
     * @param  string $valor   Valor a formatear
     * @param  int $decimal Posiciones decimales
	 * @param string $currency Signo de la moneda
     * @return int
     */
    public static function monedaColombia($valor= '0', $decimal, $currency='')
    {
        return $currency.number_format((float) $valor, $decimal, ',', '.');
    }

    public static function monedaColombiaBarras($valor= '0', $decimal)
    {
        return number_format((float) $valor, $decimal, ',', '');

    }

    /**
     * Sanear Ampersand
     * @param  string $cadena Recibe una cadena para sanar el ampersand
	 * y evitar excepciones al momento de usar php word.
     * @return mixed
     */
    public static function sanarAmpersand($cadena)
    {
        return str_replace("&", "&amp;", $cadena);
    }

	/**
	 * Formatea una fecha dada.
	 * @param string $fecha Fecha a castear.
	 * @param string $format Formato de la fecha a devolver.
	 * @return mixed
	 */
	public static function formatearFecha($fecha, $format)
    {
    	try {
		    $dateTimeObject = new \DateTime($fecha);
		} catch (\Exception $exc) {
		    return $fecha;
		}

		$date = Carbon::parse($fecha);
		return $date->format($format);
    }

    /**
	 * Verifica si un email es valido.
	 * @param string $correo Cadena del correo a validar
	 * @param string $format Formato de la fecha a devolver.
	 * @return mixed
	 */
	public static function is_valid_email($correo)
    {
        return (false !== filter_var($correo, FILTER_VALIDATE_EMAIL));
    }

	/**
	 * Obtiene la ruta relativa de un disco.
	 * @param $disk Nombre del disco definido en config\filesystems.php
	 * @return mixed
	 * @throws \Exception
	 */
	public static function relativePathDisk($disk = null)
    {
        if ($disk == null){
            throw new \Exception('Debe definir un disco');
        }
        return Storage::disk($disk)
            ->getDriver()
            ->getAdapter()
            ->getPathPrefix();
    }


	public static function redondear($valor,$redondeo)
	{
		return round(ceil($valor / $redondeo),2,PHP_ROUND_HALF_UP) * $redondeo;
	}

    /***redonderar mil mas cercano***/
    public static function redondearmil($valor,$redondeo)
    {
        return  round($valor / $redondeo) * $redondeo;
    }

	public static function formatearFecha2($fecha, $format)
    {
    	try {
		    $dateTimeObject = new \DateTime($fecha);
		} catch (\Exception $exc) {
		    return $fecha;
		}

		$date = Carbon::parse($fecha);
		return $date->format($format);
    }

    public static function mesNombre($mes) {

            switch ($mes) {

                case '01':
                    return 'Enero';
                break;

                case '02':
                    return 'Febrero';
                break;

                case '03':
                    return 'Marzo';
                break;

                case '04':
                    return 'Abril';
                break;

                case '05':
                    return 'Mayo';
                break;

                case '06':
                    return 'Junio';
                break;

                case '07':
                    return 'Julio';
                break;

                case '08':
                    return 'Agosto';
                break;

                case '09':
                    return 'Septiembre';
                break;

                case '10':
                    return 'Octubre';
                break;

                case '11':
                    return 'Noviembre';
                break;

                case '12':
                    return 'Diciembre';
                break;

                default:
                    return '';
                break;

            }

     }

    public static function diaLetra($dia) {

        switch ($dia) {

            case '1':
                return 'Un';
            break;

            case '2':
                return 'Dos';
            break;

            case '3':
                return 'Tres';
            break;

            case '4':
                return 'Cuatro';
            break;

            case '5':
                return 'Cinco';
            break;

            case '6':
                return 'Seis';
            break;

            case '7':
                return 'Siete';
            break;

            case '8':
                return 'Ocho';
            break;

            case '9':
                return 'Nueve';
            break;

            case '10':
                return 'Diez';
            break;

            case '11':
                return 'Once';
            break;

            case '12':
                return 'Doce';
            break;

            case '13':
                return 'Trece';
            break;

            case '14':
                return 'Catorce';
            break;

            case '15':
                return 'Quince';
            break;

            case '16':
                return 'Dieciséis';
            break;

            case '17':
                return 'Diecisiete';
            break;

            case '18':
                return 'Dieciocho';
            break;

            case '19':
                return 'Diecinueve';
            break;

            case '20':
                return 'Veinte';
            break;

            case '21':
                return 'Veintiuno';
            break;

            case '22':
                return 'Veintidós';
            break;

            case '23':
                return 'Veintitrés';
            break;

            case '24':
                return 'Veinticuatro';
            break;

            case '25':
                return 'Veinticinco';
            break;

            case '26':
                return 'Veintiséis';
            break;

            case '27':
                return 'Veintisiete';
            break;

            case '28':
                return 'Veintiocho';
            break;

            case '29':
                return 'Veintinueve';
            break;

            case '30':
                return 'Treinta';
            break;

            case '31':
                return 'Treinta y Uno';
            break;

            default:
                return '';
            break;

        }

    }

    public static function diaNombre($fecha) {
      $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
      return $dias[date('w', strtotime($fecha))];
    }

    public static function monedaColombia2($valor) {
        return number_format($valor, 2, ',', '.');
    }

    public static function monedaColombiaSinCeros($valor) {
        return number_format($valor, 0, ',', '.');
    }

    public static function fechaReportesPresupuesto($fechaInicio = null, $fechaFin = null)
    {
        // $fechaInicio = isset($fechaInicio) ? $fechaInicio : Carbon::now()->toDateString();
        // $fechaFin = isset($fechaFin) ? $fechaFin : Carbon::now()->toDateString();

        return json_decode(json_encode([
            'start_current_month' => Carbon::parse($fechaFin)->startOfMonth()->toDateString(),
            'end_current_month'   => Carbon::parse($fechaFin)->endOfMonth()->toDateString(),
            'start_first_month'   => Carbon::parse($fechaInicio)->year .'-01-01',
            'end_last_month'      => Carbon::parse($fechaFin)->startofMonth()->subMonth()->endOfMonth()->toDateString()
        ]));
    }

}
