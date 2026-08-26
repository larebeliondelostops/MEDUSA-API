<?php

namespace Tests\Unit;

use App\Events\Tenant\IncidentChanged;
use App\Support\TenantBroadcastChannel;
use Tests\TestCase;

class IncidentChangedTest extends TestCase
{
    public function test_it_uses_a_private_channel_scoped_to_the_tenant(): void
    {
        $event = new IncidentChanged('cologne', 'created', ['uuid' => 'incident-1']);

        $this->assertSame('private-tenant.cologne.incidents', $event->broadcastOn()->name);
        $this->assertSame('incident.created', $event->broadcastAs());
        $this->assertSame([
            'tenant' => 'cologne',
            'action' => 'created',
            'incident' => ['uuid' => 'incident-1'],
        ], $event->broadcastWith());
    }

    public function test_different_tenants_get_different_channels(): void
    {
        $cologne = new IncidentChanged('cologne', 'updated', []);
        $villavicencio = new IncidentChanged('villavicencio', 'updated', []);

        $this->assertNotSame(
            $cologne->broadcastOn()->name,
            $villavicencio->broadcastOn()->name
        );
    }

    public function test_user_channel_keys_are_normalized_and_do_not_expose_email(): void
    {
        $key = TenantBroadcastChannel::userKey(' User@Example.COM ');

        $this->assertSame(hash('sha256', 'user@example.com'), $key);
        $this->assertStringNotContainsString('@', $key);
    }
}
