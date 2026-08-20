<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
<<<<<<< HEAD
    
    protected $except = [
        
=======
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    ];
}
