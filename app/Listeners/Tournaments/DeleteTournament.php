<?php

namespace App\Listeners\Tournaments;

use App\Events\Tournaments\InsufficientTeamsRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteTournament
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
     * @param  InsufficientTeamsRegistered  $event
     * @return void
     */
    public function handle(InsufficientTeamsRegistered $event)
    {
        $event->tournament->delete();
    }
}
