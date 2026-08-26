<?php

namespace App\Support;

use App\Events\Tenant\IncidentChanged;
use Illuminate\Support\Facades\Log;
use Throwable;

final class TenantIncidentBroadcaster
{
    public static function broadcast(string $action, array $incident): void
    {
        if (! tenancy()->initialized) {
            return;
        }

        $tenantId = (string) tenant('id');

        try {
            event(new IncidentChanged($tenantId, $action, $incident));
        } catch (Throwable $exception) {
            // Realtime delivery must never roll back an incident already persisted.
            Log::warning('Unable to broadcast tenant incident event.', [
                'tenant' => $tenantId,
                'action' => $action,
                'exception' => $exception->getMessage(),
            ]);
        }
    }
}
