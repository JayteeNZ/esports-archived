<?php

namespace App\Events\Match;

use App\Models\Match;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ScoreCalculationsComplete
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $match;

    public $teamThatWon;

    public $teamThatLost;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Match $match, $teamThatWon, $teamThatLost)
    {
        $this->teamThatWon = $teamThatWon;
        $this->teamThatLost = $teamThatLost;
        $this->match = $match;
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
