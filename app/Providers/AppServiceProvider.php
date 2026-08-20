<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Schema::defaultStringLength(191);
<<<<<<< HEAD

        \Carbon\Carbon::setLocale(config('app.locale'));
=======
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    }

    public function register()
    {
<<<<<<< HEAD
        
=======
        //
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    }
}