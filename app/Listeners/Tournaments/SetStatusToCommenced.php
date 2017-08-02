<?php

namespace App\Listeners\Tournaments;

use App\Events\Tournaments\TournamentStarted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetStatusToCommenced
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
     * @param  TournamentStarted  $event
     * @return void
     */
    public function handle(TournamentStarted $event)
    {
        $event->tournament->setStatus(1);
    }
}
