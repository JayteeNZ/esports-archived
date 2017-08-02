<?php

namespace App\Listeners\Tournaments;

use App\Events\Tournaments\ParticipantsAddedToBracket;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Tournaments\BracketsStarted;

class StartBrackets
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
        $event->bracket->start();
        event(new BracketsStarted($event->tournament, $event->bracket));
    }
}
