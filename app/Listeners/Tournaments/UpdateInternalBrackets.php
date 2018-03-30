<?php

namespace App\Listeners\Tournaments;

use App\Models\Bracket;
use App\Events\Tournaments\BracketsCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateInternalBrackets
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
        Bracket::create([
            'challonge_id' => $event->bracket->id,
            'tournament_id' => $event->tournament->id,
            'url' => $event->bracket->url
        ]);
    }
}
