<?php

namespace App\Events\Modules\hackathon;

use App\Support\TenantBroadcastChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class HackathonWebSocket implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private string $tenantId;

    private string $userKey;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(private string $userEmail)
    {
        $this->tenantId = TenantBroadcastChannel::tenantId();
        $this->userKey = TenantBroadcastChannel::userKey($userEmail);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel("tenant.{$this->tenantId}.users.{$this->userKey}.incidents");
    }

    public function broadcastAs()
    {
        return 'newIncident';
    }
}

