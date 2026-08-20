<?php

return [

<<<<<<< HEAD
    
=======
    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee

    'paths' => [
        resource_path('views'),
    ],

<<<<<<< HEAD
    
=======
    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    */
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),

];
