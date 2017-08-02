<?php

namespace App\Listeners\Tournaments;

use App\Events\Tournaments\BracketsStarted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Tournaments\MatchesRetrieved;

class RetrieveMatches
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
     * @param  BracketsStarted  $event
     * @return void
     */
    public function handle(BracketsStarted $event)
    {
        $challonge = resolve('challonge');
        $matches = $challonge->getMatches($event->bracket->id);

        event(new MatchesRetrieved($event->tournament, $matches));
    }
}
