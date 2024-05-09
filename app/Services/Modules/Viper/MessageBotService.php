<?php

namespace App\Services\Modules\Viper;

use App\Events\Modules\Viper\ViperWebSocket;
use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\MessageBotInterface;
use App\Models\Modules\Viper\MessageBot;
use Exception;

class MessageBotService implements MessageBotInterface{

    public function createNewMessageBot(Collection $messageBot): Collection
    {
        $newMessageBot = new MessageBot($messageBot->toArray());
        $newMessageBot->save();
        
        return collect($newMessageBot);
    }

    public function updateMessageBot(Collection $messageBot, int $id): Collection
    {
        $messageBotUpdate = MessageBot::findOrFail($id);
        $messageBotUpdate->fill($messageBot->toArray());
        $messageBotUpdate->save();
        
        return collect($messageBotUpdate);
    }

    public function getAllMessageBotByProjectUserRole(int $projectUserRoleId): Collection
    {
        $messageBotGot = MessageBot::where('project_user_role_id', $projectUserRoleId)->get();
        
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
