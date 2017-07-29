<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckTournamentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:tournament';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks to see if tournaments should be started';

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
        $tournaments = \App\Tournament::where('status', 'scheduled')->get();
        foreach($tournaments as $tournament) {
            if ($tournament->starts_at->lte(\Carbon\Carbon::now())) {
                // event(TournamentHasStarted::class);
            }
        }
    }
}
