<?php

namespace App\Events\Tenant;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class IncidentChanged implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public string $tenantId,
        public string $action,
        public array $incident
    ) {
    }

    public function broadcastOn(): PrivateChannel
    {
        return new PrivateChannel("tenant.{$this->tenantId}.incidents");
    }

    public function broadcastAs(): string
    {
        return "incident.{$this->action}";
    }

    public function broadcastWith(): array
    {
        return [
            'tenant' => $this->tenantId,
            'action' => $this->action,
            'incident' => $this->incident,
        ];
    }
}
