<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ReportScoresCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parallel:report-scores';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks for scores older than 10 minutes and advances the team if required';

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
        $matches = Match::awaitingScores()->get();
    }
}
