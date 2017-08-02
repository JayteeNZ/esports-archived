<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Tournament;
use Illuminate\Console\Command;
use App\Events\Tournaments\RegistrationClosed;

class CloseRegistrationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parallel:close-registrations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loops over each Tournament and closed the registration if required.';

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
        $tournaments = Tournament::whereScheduled()->get();
        foreach($tournaments as $tournament) {
            if ($tournament->starts_at->addMinutes(-5)->lte(Carbon::now()) && $tournament->registration_status === 1) {
                event(new RegistrationClosed($tournament));
            }
        }
    }
}
