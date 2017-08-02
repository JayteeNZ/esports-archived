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

class BracketsCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The Original Tournament instance.
     * @var Object
     */
    public $tournament;

    /**
     * The newly created bracket from CreateBrackets Listener.
     * @var [type]
     */
    public $bracket;

    /**
     * The chunk of teams for the Bracket.
     * @var [type]
     */
    public $teams;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Tournament $tournament, $bracket, $teams)
    {
        $this->tournament = $tournament;
        $this->bracket = $bracket;
        $this->teams = $teams;
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
