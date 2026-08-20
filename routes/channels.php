<?php

use Illuminate\Support\Facades\Broadcast;

<<<<<<< HEAD
=======
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

>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
