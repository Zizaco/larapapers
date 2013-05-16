<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Lessy Origin and Destination
    |--------------------------------------------------------------------------
    |
    | The place where the the tree of less files will be loaded and where the
    | compile result will be dumped. Relative to app folder.
    |
    */

    'origin'        => 'assets',
    
    'destination'   => '../public/assets',


    /*
    |--------------------------------------------------------------------------
    | Force Compile
    |--------------------------------------------------------------------------
    |
    | This option will force the application to check if any less file have
    | changed in order to compile it no matter the environment that is running.
    | This way you can compile less files in production environment.
    |
    | PS: Even with force compile set to true, the compilation will only occur
    | if changes are detected within the .less files in the origin directory.
    |
    */

    'force_compile' => false,

);
