<?php

namespace App\Observers\Modules\hackathon;
use App\Events\Modules\Hackathon\HackathonWebSocket;
use App\Models\Villavicencio\Incident;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class IncidentObserver
{
    public function created(Incident $incident): void
    {
        try
        {
            $userAuthenticated = Auth::user();
            $socket = new HackathonWebSocket($userAuthenticated->email);
            event($socket);
        }
        catch(Exception $exception)
        {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
        }
    }
}