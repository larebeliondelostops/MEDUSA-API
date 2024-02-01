<?php

namespace App\Http\Controllers\Viper;

use App\Http\Request\Viper\PrecedenceRequest;
use App\DTOs\Viper\Precedence\PrecedenceDTO;
use App\Interfaces\Viper\PrecedenceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Controlador que maneja todo lo relacionado con las precedencias de las actividades de un proyecto en Viper.
 *
 * @package    App\Http\Controllers\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Daniel Alferez <dan.alferez1@gmail.com>
 * @version    v1.0.0
 */
class PrecedenceController extends BaseController
{
    private PrecedenceInterface $precedenceInterface;

    public function __construct(PrecedenceInterface $precedenceInterface)
    {
        parent::__construct();
        $this->precedenceInterface = $precedenceInterface;
    }

    /**
     * Mostrar una lista de precedencias.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $precedences = $this->precedenceInterface->getAllPrecedences();

            return response()->json([
                'data' => $precedences,
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Almacenar una nueva precedencia.
     *
     * @param  \App\Http\Request\Viper\PrecedenceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrecedenceRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $precedenceDTO = new PrecedenceDTO($validatedData);

            $newPrecedence = $this->precedenceInterface->storePrecedence($precedenceDTO);

            return response()->json([
                'message' => 'Precedencia creada correctamente',
                'data' => $newPrecedence,
            ], 201);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Eliminar la precedencia especificada.
     *
     * @param  int  $precedenceId
     * @return \Illuminate\Http\Response
     */
    public function destroy($precedenceId)
    {
        try {
            $this->precedenceInterface->deletePrecedence($precedenceId);

            return response()->json(['message' => 'Precedencia eliminada correctamente']);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    /**
     * Mostrar la precedencia especificada.
     *
     * @param  int  $precedenceId
     * @return \Illuminate\Http\Response
     */
    public function show($precedenceId)
    {
        try {
            $precedence = $this->precedenceInterface->getPrecedence($precedenceId);

            return response()->json(['data' => $precedence]);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    
    /**
     * Mostrar la precedencia especificada.
     *
     * @param  int  $precedenceId
     * @return \Illuminate\Http\Response
     */
    public function update(PrecedenceRequest $request, int $precedenceId)
    {
        try {

            $validatedData = $request->validated();

            $precedenceDTO = new PrecedenceDTO($validatedData);

            $this->precedenceInterface->updatePrecedence($precedenceId, $precedenceDTO);

            return response()->json(['message' => 'Precedencia actualizada correctamente']);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
