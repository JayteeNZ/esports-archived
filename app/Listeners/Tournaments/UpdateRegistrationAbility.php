<?php

namespace App\Listeners\Tournaments;

use App\Events\Tournaments\RegistrationClosed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Bracket;
use App\Match;
use App\Team;

class UpdateRegistrationAbility
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
     * @param  RegistrationClosed  $event
     * @return void
     */
    public function handle(RegistrationClosed $event)
    {
        $event->tournament->setRegistrationStatus(false);
    }
}
