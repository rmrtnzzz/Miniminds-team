<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{
<<<<<<< HEAD
    
=======
    /**
     * Get the host patterns that should be trusted.
     *
     * @return array<int, string|null>
     */
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
    public function hosts()
    {
        return [
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}
