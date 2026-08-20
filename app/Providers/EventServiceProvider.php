<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
<<<<<<< HEAD
    
=======
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

<<<<<<< HEAD
    
    public function boot()
    {
        
=======
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    }
}
