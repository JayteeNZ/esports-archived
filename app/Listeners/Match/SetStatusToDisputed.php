<?php

namespace App\Listeners\Match;

use App\Events\Match\MatchDisputed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetStatusToDisputed
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
     * @param  MatchDisputed  $event
     * @return void
     */
    public function handle(MatchDisputed $event)
    {
        $event->match->updateStatus(4);
    }
}
