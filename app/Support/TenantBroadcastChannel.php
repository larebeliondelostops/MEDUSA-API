<?php

namespace App\Support;

use RuntimeException;

final class TenantBroadcastChannel
{
    public static function tenantId(): string
    {
        if (! tenancy()->initialized) {
            throw new RuntimeException('A tenant must be initialized before broadcasting.');
        }

        return (string) tenant('id');
    }

    public static function userKey(string $email): string
    {
        return hash('sha256', mb_strtolower(trim($email)));
    }
}
