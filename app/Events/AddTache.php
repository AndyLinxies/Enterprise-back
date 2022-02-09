<?php

namespace App\Events;

use App\Models\Tache;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AddTache
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $store;
    public $thisEntUser;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($store,$thisEntUser)
    {
        $this->store=$store;
        $this->thisEntUser=$thisEntUser;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
