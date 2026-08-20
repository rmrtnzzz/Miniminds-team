<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
<<<<<<< HEAD
    
    protected $policies = [
        
    ];

    
=======
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    public function boot()
    {
        $this->registerPolicies();

<<<<<<< HEAD
        
=======
        //
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    }
}
