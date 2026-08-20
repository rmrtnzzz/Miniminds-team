<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
<<<<<<< HEAD
    
    protected $except = [
        
=======
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    ];
}
