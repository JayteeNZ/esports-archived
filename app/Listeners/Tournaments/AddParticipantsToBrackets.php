<?php

namespace App\Listeners\Tournaments;

use App\Events\Tournaments\BracketsCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Tournaments\ParticipantsAddedToBracket;

class AddParticipantsToBrackets
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BracketsCreated  $event
     * @return void
     */
    public function handle(BracketsCreated $event)
    {
        foreach($event->teams as $team)
        {
            $participants[] = $event->bracket->addParticipant([
                'participant[name]' => $team->name,
                'participant[misc]' => $team->id
            ]);
        }
        event(new ParticipantsAddedToBracket($event->tournament, $event->bracket, $participants));
    }
}
