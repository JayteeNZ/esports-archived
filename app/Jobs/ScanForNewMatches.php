<?php

namespace App\Jobs;

use App\Models\{Match, Team};
use App\Events\Tournaments\ChallongeUpdated;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ScanForNewMatches implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $bracket;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($bracket)
    {
        $this->bracket = $bracket;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $challonge = resolve('challonge');
        $matches = $challonge->getMatches($this->bracket->challonge_id);
        foreach($this->filterMatches($matches) as $match) {
            $internalMatch = Match::create([
                'challonge_id' => $match->id,
                'tournament_id' => $this->bracket->tournament_id,
                'challonge_tournament_id' => $match->tournament_id,
                'round' => $match->round,
                'status' => 1,
                'identifier' => $match->identifier,
                'started_at' => \Carbon\Carbon::now()
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
            if ($match->state == 'pending' || $match->state == 'complete') {
                continue;
            }
            $scheduled[] = $match;
        }
        return $scheduled;
    }
}
