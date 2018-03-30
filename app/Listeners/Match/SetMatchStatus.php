<?php

namespace App\Listeners\Match;

use App\Events\Match\ScoreReported;
use App\Events\Match\BothTeamsHaveReported;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetMatchStatus
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
     * @param  ScoresReported  $event
     * @return void
     */
    public function handle(ScoreReported $event)
    {
        // status => 2 => Team One Reported
        // status => 3 => Team Two Reported
        
        if ($event->match->score->count() === 2) {
            return event(new BothTeamsHaveReported($event->match));
        }

        if ($event->match->score->first()->team_id == $event->team->id) {
            return $event->match->updateStatus(2);
        } else {
            return $event->match->updateStatus(3);
        }
    }
}
