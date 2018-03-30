<?php

namespace App\Events\Match;

use App\Models\Team;
use App\Models\Match;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ScoreReported
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $match;

    public $team;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Match $match, Team $team)
    {
        $this->match = $match;
        $this->team = $team;
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
