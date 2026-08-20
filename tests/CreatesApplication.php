<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
<<<<<<< HEAD
    
=======
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
