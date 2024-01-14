<?php

namespace App\Http\Controllers\Viper;

use App\Http\Controllers\Controller;


use App\DTOs\Viper\SectorDTO;
use App\Interfaces\Viper\SectorInterface;


use Illuminate\Database\QueryException;
use PDOException;
use Exception;
use Illuminate\Http\Request;

/**
 * Controlador para manejar operaciones relacionadas con sectores.
 *
 * Este controlador maneja las solicitudes HTTP relacionadas con sectores en el sistema Viper.
 *
 * @package App\Http\Controllers\Viper
 */
class SectorController extends Controller
{
    private SectorInterface $sectorInterface;

    /**
     * Constructor del controlador.
     *
     * @param SectorInterface $sectorInterface Interfaz para el servicio de sectores.
     */
    public function __construct(SectorInterface $sectorInterface)
    {
        $this->sectorInterface = $sectorInterface;
    }

    /**
     * Obtiene todos los sectores y retorna una respuesta JSON.
     *
     * @param Request $request Objeto de solicitud HTTP.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con los sectores.
     */
    public function index(Request $request)
    {
        try
        {
            $sectors = $this->sectorInterface->getAllSectors();
            return response()->json($sectors, 200);
        }
        catch(Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
        }       
    }
}
