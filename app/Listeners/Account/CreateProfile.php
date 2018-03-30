<?php

namespace App\Listeners\Account;

use App\Events\Account\UserHasRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateProfile
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
     * @param  UserHasRegister  $event
     * @return void
     */
    public function handle(UserHasRegistered $event)
    {
        $event->user->profile()->create([]);
    }
}
