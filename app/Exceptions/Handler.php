<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
<<<<<<< HEAD
    
    protected $dontReport = [
        
    ];

    
=======
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

<<<<<<< HEAD
    
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            
=======
    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
        });
    }
}
