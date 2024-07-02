<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
        'super_admin' => [
            'driver' => 'session',
            'provider' => 'super_admin',
        ],
        'super_admin_api' => [
            'driver' => 'token',
            'provider' => 'super_admin',
            'hash' => false,
        ],
        'supplier' => [
            'driver' => 'session',
            'provider' => 'suppliers',
        ],
        'supplier_api' => [
            'driver' => 'token',
            'provider' => 'suppliers',
            'hash' => false,
        ],
        'dropshiper' => [
            'driver' => 'session',
            'provider' => 'dropshipers',
        ],
        'dropshiper_api' => [
            'driver' => 'token',
            'provider' => 'dropshipers',
            'hash' => false,
        ],
        'seller' => [
            'driver' => 'session',
            'provider' => 'sellers',
        ],
        'seller_api' => [
            'driver' => 'token',
            'provider' => 'sellers',
            'hash' => false,
        ],
        'local_livereur' => [
            'driver' => 'session',
            'provider' => 'local_livereurs',
        ],
        'local_livereur_api' => [
            'driver' => 'token',
            'provider' => 'local_livereurs',
            'hash' => false,
        ],
        'company_livereur' => [
            'driver' => 'session',
            'provider' => 'company_livereurs',
        ],
        'company_livereur_api' => [
            'driver' => 'token',
            'provider' => 'company_livereurs',
            'hash' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User\User::class,
        ],
        'super_admin' => [
            'driver' => 'eloquent',
            'model' => App\Models\Super_Admin\Super_Admin::class,
        ],
        'suppliers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Supplier\Supplier::class,
        ],
        'dropshipers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Dropshiper\Dropshiper::class,
        ],
        'sellers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Seller\Seller::class,
        ],
        'local_livereurs' => [
            'driver' => 'eloquent',
            'model' => App\Models\LocalLivereur\LocalLivereur::class,
        ],
        'company_livereurs' => [
            'driver' => 'eloquent',
            'model' => App\Models\CompanyLivereur\CompanyLivereur::class,
        ],
        
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'super_admin' => [
            'provider' => 'super_admin',
            'table' => 'admin_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'sellers' => [
            'provider' => 'sellers',
            'table' => 'seller_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'dropshipers' => [
            'provider' => 'dropshipers',
            'table' => 'dropshiper_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'local_livereurs' => [
            'provider' => 'local_livereurs',
            'table' => 'local_livereur_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'company_livereurs' => [
            'provider' => 'company_livereurs',
            'table' => 'company_livereur_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'suppliers' => [
            'provider' => 'suppliers',
            'table' => 'supplier_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800,

];
