<?php

namespace App\Listeners\Match;

use App\Events\Match\BothTeamsHaveReported;
use App\Events\Match\MatchDisputed;
use App\Events\Match\ScoreCalculationsComplete;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompareScoresAndReport
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
     * @param  BothTeamsHaveReported  $event
     * @return void
     */
    public function handle(BothTeamsHaveReported $event)
    {
        $scores = $event->match->score;
        $teamOne = $event->match->teamOne();
        $teamTwo = $event->match->teamTwo();
        // needs updating to become more complex.
        switch($scores)
        {
            // team one wins
            case $scores->first()->score == $scores->last()->opposition_score:
                $teamThatWon = $scores->first()->team;
                $teamThatLost = $scores->last()->team;
                return event(new ScoreCalculationsComplete($event->match, $teamThatWon, $teamThatLost));
            // team two wins
            case $scores->last()->score == $scores->first()->opposition_score:
                $teamThatWon = $scores->last()->team;
                $teamThatLost = $scores->first()->team;
                return event(new ScoreCalculationsComplete($event->match, $teamThatWon, $teamThatLost));
            // match disputed
            default:
                return event(new MatchDisputed($event->match));
        }
    }
}
