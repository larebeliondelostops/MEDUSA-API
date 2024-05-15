<?php

namespace App\Services\Modules\Viper;

use App\Interfaces\Modules\Viper\ProjectBotDocumentsInterface;
use App\Models\Modules\Viper\Document;
use App\Models\Modules\Viper\ProjectUserRole;
use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\MessageBotInterface;
use App\Models\Modules\Viper\MessageBot;

class MessageBotService implements MessageBotInterface{
    
    private ProjectBotDocumentsInterface $documentInterface;


    public function __construct(ProjectBotDocumentsInterface $documentInterface)
    {
        $this->documentInterface = $documentInterface;
    }

    public function createNewMessageBot(string $question, string $bpin): Collection
    {
        $newMessageBot = new MessageBot();
        $project_user_role = ProjectUserRole::where('project_id', $bpin)
                                            ->where('user_id', auth()->user()->id)
                                            ->firstOrFail();
        $newMessageBot->project_user_role_id = $project_user_role->id;
        $newMessageBot->query = $question;
    
        $curl = curl_init();
        $data = json_encode([
            'query' => $question,
            'bpin' => $bpin
        ]);
        
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://" . env("VIPER_EMBEDDINGS") . "/query",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            ]
        ]);
        
        $response = curl_exec($curl);
        
        if (curl_errno($curl)) {
            throw new \Exception(curl_error($curl));
        }
        
        curl_close($curl);
        $responseDecoded = json_decode($response, true);
    
        // Manejar la respuesta y los archivos de 'sources'
        if (isset($responseDecoded['response'])) {
            $newMessageBot->response = $responseDecoded['response'];
        }
        if (isset($responseDecoded['sources']) && is_array($responseDecoded['sources'])) {
            // Eliminar duplicados y concatenar en una cadena separada por comas
            $newMessageBot->files = implode(', ', array_unique($responseDecoded['sources']));
        }
    
        $newMessageBot->save();
        
        return collect($newMessageBot);
    }

    public function uploadFiles(int $fileId, string $bpin): Collection
    {
        $document = Document::where('id', $fileId)->firstOrFail(); // Obtener el documento
        $fileUrl = $document->url; // URL del archivo en Digital Ocean Storage
    
        // Descargar el archivo temporalmente
        $tempPath = tempnam(sys_get_temp_dir(), 'upload'); // Crear archivo temporal
        copy($fileUrl, $tempPath); // Descargar el archivo desde la URL al archivo temporal
    
        // Obtener el nombre del archivo original desde la URL
        $originalFileName = basename($fileUrl);
    
        $curl = curl_init();
        $data = [
            'file' => new \CURLFile($tempPath, mime_content_type($tempPath), $originalFileName),
            'bpin' => $bpin
        ];
    
        curl_setopt_array($curl, [
            CURLOPT_URL =>  "https://" . env("VIPER_EMBEDDINGS") . "/upload",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data
        ]);
    
        $response = curl_exec($curl);
    
        if (curl_errno($curl)) {
            unlink($tempPath); // Asegúrate de eliminar el archivo temporal en caso de error
            throw new \Exception(curl_error($curl));
        }
    
        curl_close($curl);
        unlink($tempPath);

        $this->documentInterface->store($fileId, $bpin);
    
        $responseDecoded = json_decode($response, true);
    
        return collect($responseDecoded);
    }

    public function getAllMessageBotByProjectUserRole(int $bpin): Collection
    {
        $projectUserRoleId = ProjectUserRole::where('project_id', $bpin)
                                            ->where('user_id', auth()->user()->id)
                                            ->firstOrFail();

        $messageBotGot = MessageBot::where('project_user_role_id', $projectUserRoleId->id)->get();
        
        $messagesBot = $messageBotGot->transform(
            function (MessageBot $messageBot)
            {
                return collect($messageBot);
            }
        );
        return collect($messagesBot);
    }

    public function getMessageBot(int $id): Collection
    {
        $messageBot = MessageBot::findOrFail($id);

        return collect($messageBot);
    }

    public function deleteMessageBot(int $id): Collection
    {
        $messageBot = MessageBot::findOrFail($id);
        $messageBot->delete();

        return collect($messageBot);
    }
}