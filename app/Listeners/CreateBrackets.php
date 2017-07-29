<?php

namespace App\Listeners;

use App\Events\TournamentHasStarted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateBrackets
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
     * @param  TournamentHasStarted  $event
     * @return void
     */
    public function handle(TournamentHasStarted $event)
    {
        $challonge = resolve('Challonge');
        $challonge->createTournament([
            'tournament[name]' => $event->tournament->name,
            'tournament[type]' => $event->tournament->format,
            'tournament[url]' => uniqid(true),
            'tournament[subdomain]' => 'parallel'
        ]);

        return true;
    }
}
