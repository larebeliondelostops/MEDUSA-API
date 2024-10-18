<?php

namespace App\Observers\Modules\hackathon;
use App\Events\Modules\hackathon\HackathonWebSocket;
use App\Models\User;
use App\Models\Villavicencio\Incident;
use Exception;
use Illuminate\Support\Facades\Log;

class IncidentObserver
{
    public function created(Incident $incident): void
    {
        try
        {
            User::chunk(250, function($users)  {
                foreach($users as $user)
                {
                    $socket = new HackathonWebSocket($user->email);
                    event($socket);
                }
            });
        }
        catch(Exception $exception)
        {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
        }
    }
}