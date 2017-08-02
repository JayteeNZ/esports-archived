<?php

namespace App\Listeners\Tournaments;

use App\Team;
use App\Events\Tournaments\ParticipantsAddedToBracket;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateInternalParticipants
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
     * @param  ParticipantsAddedToBracket  $event
     * @return void
     */
    public function handle(ParticipantsAddedToBracket $event)
    {
        foreach($event->participants as $participant)
        {
            Team::find($participant->misc)->update(['challonge_id' => $participant->id]);
        }
    }
}
