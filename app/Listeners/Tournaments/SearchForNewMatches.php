<?php

namespace App\Listeners\Tournaments;

use App\Models\Match;
use App\Models\Team;
use App\Events\Tournaments\ChallongeUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SearchForNewMatches
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
     * @param  ChallongeUpdated  $event
     * @return void
     */
    public function handle(ChallongeUpdated $event)
    {
        $challonge = resolve('challonge');
        $matches = $challonge->getMatches($event->bracket->id);
        foreach($matches as $match) {
            $internalMatch = Match::create([
                'challonge_id' => $match->id,
                'tournament_id' => $event->bracket->tournament_id,
                'challonge_tournament_id' => $match->tournament_id,
                'round' => $match->round,
                'status' => 1,
                'identifier' => $match->identifier
            ]);

            $teamOne = Team::where('challonge_id', $match->player1_id)->first()->id;
            $teamTwo = Team::where('challonge_id', $match->player2_id)->first()->id;


            $internalMatch->teams()->attach($teamOne);
            $internalMatch->teams()->attach($teamTwo);
        }
    }

    protected function filterMatches($matches)
    {
        $scheduled = [];
        foreach($matches as $match) {
            
            $scheduled[] = $match;
        }
        return $scheduled;
    }
}
