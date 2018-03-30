<?php

namespace App\Listeners\Account;

use App\Models\Role;
use App\Events\Account\UserHasRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AttachDefaultRole
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
     * @param  UserHasRegistered  $event
     * @return void
     */
    public function handle(UserHasRegistered $event)
    {
        $event->user->attachRole(Role::where('name', config('parallel.default_role'))->first()->id);
    }
}
