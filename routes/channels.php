<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// for online users
Broadcast::channel('chat', function ($user) {
    return [
    	'id' => $user->id,
    	'username' => $user->username
    ];
});

