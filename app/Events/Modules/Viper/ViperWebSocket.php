<?php

namespace App\Events\Modules\Viper;

use App\Models\Modules\Viper\Alert;
use App\Support\TenantBroadcastChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ViperWebSocket implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $tenantId;

    public string $userKey;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(public Alert $alert)
    {
        $this->tenantId = TenantBroadcastChannel::tenantId();
        $this->userKey = TenantBroadcastChannel::userKey($alert->user_email);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel("tenant.{$this->tenantId}.users.{$this->userKey}.alerts");
    }

    public function broadcastAs()
    {
        return 'alerts';
    }
}

