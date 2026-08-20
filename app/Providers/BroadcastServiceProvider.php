<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
<<<<<<< HEAD
    
=======
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    public function boot()
    {
        Broadcast::routes();

        require base_path('routes/channels.php');
    }
}
