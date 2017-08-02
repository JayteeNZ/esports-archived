<?php

namespace App\Listeners\Tournaments;

use App\Match;
use App\Team;
use App\Events\Tournaments\MatchesRetrieved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateInternalMatches
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
     * @param  MatchesRetrieved  $event
     * @return void
     */
    public function handle(MatchesRetrieved $event)
    {
        foreach($event->matches as $match) {
            Match::create([
                'challonge_id' => $match->id,
                'team_one_id' => empty($match->player1_id) ? null : Team::where('challonge_id', $match->player1_id)->first()->id,
                'team_two_id' => empty($match->player2_id) ? null : Team::where('challonge_id', $match->player2_id)->first()->id,
                'tournament_id' => $event->tournament->id,
                'round' => $match->round,
                'status' => 1,
                'identifier' => $match->identifier
            ]);
        }
    }
}
