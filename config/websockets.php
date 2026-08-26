<?php

return [
    'dashboard' => [
        'port' => env('LARAVEL_WEBSOCKETS_PORT', 6001),
        'domain' => env('LARAVEL_WEBSOCKETS_DOMAIN'),
        'path' => env('LARAVEL_WEBSOCKETS_PATH', 'laravel-websockets'),
        'middleware' => [
            'web',
            BeyondCode\LaravelWebSockets\Dashboard\Http\Middleware\Authorize::class,
        ],
    ],

    'managers' => [
        'app' => BeyondCode\LaravelWebSockets\Apps\ConfigAppManager::class,
    ],

    'apps' => [[
        'id' => env('PUSHER_APP_ID'),
        'name' => env('APP_NAME'),
        'host' => env('PUSHER_HOST'),
        'key' => env('PUSHER_APP_KEY'),
        'secret' => env('PUSHER_APP_SECRET'),
        'path' => env('PUSHER_APP_PATH'),
        'capacity' => null,
        'enable_client_messages' => false,
        'enable_statistics' => (bool) env('WEBSOCKETS_STATISTICS', false),
        'allowed_origins' => array_values(array_filter(array_map(
            'trim',
            explode(',', (string) env('WEBSOCKETS_ALLOWED_ORIGINS', ''))
        ))),
    ]],

    'replication' => [
        'mode' => env('WEBSOCKETS_REPLICATION_MODE', 'local'),
        'modes' => [
            'local' => [
                'channel_manager' => BeyondCode\LaravelWebSockets\ChannelManagers\LocalChannelManager::class,
                'collector' => BeyondCode\LaravelWebSockets\Statistics\Collectors\MemoryCollector::class,
            ],
            'redis' => [
                'connection' => env('WEBSOCKETS_REDIS_REPLICATION_CONNECTION', 'default'),
                'channel_manager' => BeyondCode\LaravelWebSockets\ChannelManagers\RedisChannelManager::class,
                'collector' => BeyondCode\LaravelWebSockets\Statistics\Collectors\RedisCollector::class,
            ],
        ],
    ],

    'statistics' => [
        'store' => BeyondCode\LaravelWebSockets\Statistics\Stores\DatabaseStore::class,
        'interval_in_seconds' => 60,
        'delete_statistics_older_than_days' => 60,
    ],

    'max_request_size_in_kb' => 250,

    'ssl' => [
        'local_cert' => env('LARAVEL_WEBSOCKETS_SSL_LOCAL_CERT'),
        'capath' => env('LARAVEL_WEBSOCKETS_SSL_CA'),
        'local_pk' => env('LARAVEL_WEBSOCKETS_SSL_LOCAL_PK'),
        'passphrase' => env('LARAVEL_WEBSOCKETS_SSL_PASSPHRASE'),
        'verify_peer' => env('APP_ENV') === 'production',
        'allow_self_signed' => env('APP_ENV') !== 'production',
    ],

    'handlers' => [
        'websocket' => BeyondCode\LaravelWebSockets\Server\WebSocketHandler::class,
        'health' => BeyondCode\LaravelWebSockets\Server\HealthHandler::class,
        'trigger_event' => BeyondCode\LaravelWebSockets\API\TriggerEvent::class,
        'fetch_channels' => BeyondCode\LaravelWebSockets\API\FetchChannels::class,
        'fetch_channel' => BeyondCode\LaravelWebSockets\API\FetchChannel::class,
        'fetch_users' => BeyondCode\LaravelWebSockets\API\FetchUsers::class,
    ],

    'promise_resolver' => React\Promise\FulfilledPromise::class,
];
