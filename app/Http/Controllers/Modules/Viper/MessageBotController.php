<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\MessageBotRequest;
use App\Interfaces\Modules\Viper\MessageBotInterface;
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
class MessageBotController extends BaseController
{
    private MessageBotInterface $messageBotInterface;

    public function __construct(MessageBotInterface $messageBotInterface)
    {
        parent::__construct();
        $this->messageBotInterface = $messageBotInterface;
    }

    public function store(MessageBotRequest $request)
    {
        try {
            $messageBotCreated = $this->messageBotInterface->createNewMessageBot($request->question, $request->bpin);

            return response()->json([
                'message' => 'Message bot created successfully.',
                'data'    => $messageBotCreated
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }


    public function uploadFiles(Request $request)
    {
        try {
            $messageBotFiles = $this->messageBotInterface->uploadFiles($request->file, $request->bpin);

            return response()->json([
                'message' => 'Message bot created successfully.',
                'data'    => $messageBotFiles
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }


    public function index(int $bpin)
    {
        try {
            $messagesBot = $this->messageBotInterface->getAllMessageBotByProjectUserRole($bpin);
            return response()->json([
                'data' => $messagesBot,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function show(int $id)
    {
        try {
            $messagesBot = $this->messageBotInterface->getMessageBot($id);
            return response()->json([
                'data' => $messagesBot,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function destroy(int $id)
    {
        try {
            $alert = $this->messageBotInterface->deleteMessageBot($id);
            return response()->json([
                'message' => 'Message Bot deleted successfully',
                'data'=> $alert
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
