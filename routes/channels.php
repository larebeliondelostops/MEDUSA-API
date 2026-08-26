<?php

use Illuminate\Support\Facades\Broadcast;
use App\Support\TenantBroadcastChannel;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('tenant.{tenantId}.users.{id}', function ($user, string $tenantId, int $id): bool {
    return $user !== null
        && tenancy()->initialized
        && hash_equals((string) tenant('id'), $tenantId)
        && (int) $user->id === $id;
}, ['guards' => ['api']]);

Broadcast::channel('tenant.{tenantId}.incidents', function ($user, string $tenantId): bool {
    return $user !== null
        && tenancy()->initialized
        && hash_equals((string) tenant('id'), $tenantId);
}, ['guards' => ['api']]);

Broadcast::channel('tenant.{tenantId}.users.{userKey}.{stream}', function (
    $user,
    string $tenantId,
    string $userKey,
    string $stream
): bool {
    return $user !== null
        && tenancy()->initialized
        && hash_equals((string) tenant('id'), $tenantId)
        && in_array($stream, ['alerts', 'incidents'], true)
        && hash_equals(TenantBroadcastChannel::userKey((string) $user->email), $userKey);
}, ['guards' => ['api']]);
