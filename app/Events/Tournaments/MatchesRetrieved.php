<?php

namespace App\Events\Tournaments;

use App\Tournament;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MatchesRetrieved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $tournament;

    public $matches;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Tournament $tournament, $matches = [])
    {
        $this->tournament = $tournament;
        $this->matches = $matches;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
