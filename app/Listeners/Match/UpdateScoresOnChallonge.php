<?php

namespace App\Listeners\Match;

use App\Events\Tournaments\ChallongeUpdated;
use App\Events\Match\ScoreCalculationsComplete;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateScoresOnChallonge
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
        $challonge = resolve('challonge');
        $match = $challonge->getMatch(config('services.challonge.subdomain') . '-' . $event->match->bracket->url, $event->match->challonge_id);
        $scoreWinner = $event->match->teamOne()->scores->where('match_id', $event->match->id)->first()->score;
        $scoreLoser = $event->match->teamTwo()->scores->where('match_id', $event->match->id)->first()->score;
        
        $winner = $scoreWinner > $scoreLoser ? $event->match->teamOne() : $event->match->teamTwo();

        $match->update([
            'match[scores_csv]' => "{$scoreWinner}-{$scoreLoser}",
            'match[winner_id]' => $winner->challonge_id
        ]);

        $job = (new \App\Jobs\ScanForNewMatches($event->match->bracket))
            ->delay(\Carbon\Carbon::now()->addSeconds(15));
        dispatch($job);
    }
}
