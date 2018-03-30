<?php

namespace App\Listeners\Match;

use App\Events\Match\ScoreCalculationsComplete;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetStatusToComplete
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
     * @param  ScoreCalculationsComplete  $event
     * @return void
     */
    public function handle(ScoreCalculationsComplete $event)
    {
        $event->match->updateStatus(5);
    }
}
