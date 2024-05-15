<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Interfaces\Modules\Viper\ProjectBotDocumentsInterface;
use Exception;
use Illuminate\Http\Request;

/**
 * Controlador para la entidad Alerta en el sistema Viper.
 *
 * @package App\Http\Controllers\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class ProjectBotDocumentsController extends BaseController
{
    private ProjectBotDocumentsInterface $projectBotDocumentsInterface;

    public function __construct(ProjectBotDocumentsInterface $projectBotDocumentsInterface)
    {
        parent::__construct();
        $this->projectBotDocumentsInterface = $projectBotDocumentsInterface;
    }

    public function store(Request $request)
    {
        try {
            $messageBotCreated = $this->projectBotDocumentsInterface->store($request->document, $request->bpin);

            return response()->json([
                'message' => 'Relationship created succesfully.',
                'data'    => $messageBotCreated
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function index(int $bpin)
    {
        try {
            $filesResponse = $this->projectBotDocumentsInterface->index($bpin);

            return response()->json([
                'data' => $filesResponse,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
