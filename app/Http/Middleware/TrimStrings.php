<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
<<<<<<< HEAD
    
=======
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array<int, string>
     */
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    protected $except = [
        'current_password',
        'password',
        'password_confirmation',
    ];
}
