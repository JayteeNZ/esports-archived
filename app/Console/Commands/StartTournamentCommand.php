<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Tournament;
use Illuminate\Console\Command;
use App\Events\Tournaments\TournamentStarted;
use App\Events\Tournaments\InsufficientTeamsRegistered;

class StartTournamentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parallel:start-tournaments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loops over each Tournament and starts it if required.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tournaments = Tournament::whereScheduledAndRegistrationClosed()->get();
        foreach($tournaments as $tournament) {
            if ($tournament->teams->count() < $tournament->min_teams) {
                return event(new InsufficientTeamsRegistered($tournament));
            }
            if ($tournament->starts_at->lte(Carbon::now())) {
                event(new TournamentStarted($tournament));
            }
        }
    }
}
