<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Package Connection
    |--------------------------------------------------------------------------
    |
    | You can set a different database connection for this package. It will set
    | new connection for models ActionLog. When this option is null,
    | it will connect to the main database, which is set up in database.php
    |
    */

    'connection' => null,

    /*
    |--------------------------------------------------------------------------
    | Package Models
    |--------------------------------------------------------------------------
    |
    | You can set up same models that requires logging. When this option is null,
    | no logging will be done.
    |
    */
    
    'models' => [
    	'\App\User',
    ],
];
