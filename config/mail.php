<?php

/* return [
    'driver' => env('MAIL_DRIVER', 'smtp'),

    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
    'port' => env('MAIL_PORT', 587),

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

    'encryption' => env('MAIL_ENCRYPTION', 'tls'),

    'username' => env('MAIL_USERNAME'),

    'password' => env('MAIL_PASSWORD'),

    'sendmail' => '/usr/sbin/sendmail -bs',

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
*/

return [

'driver' => env('MAIL_DRIVER', 'smtp'),

'host' => env('MAIL_HOST', 'smtp.mailtrap.io'),

'port' => env('MAIL_PORT', 2525),

'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'lxxxx@xxxx.com'),
        'name' => env('MAIL_FROM_NAME', 'myMail'),
    ],
'encryption' => env('MAIL_ENCRYPTION', 'tls'),

'username' => env('MAIL_USERNAME'),//this setting in .env only leave as is here

'password' => env('MAIL_PASSWORD'),//this setting in .env only leave as is here

'sendmail' => '/usr/sbin/sendmail -bs',

'stream' => [
    'ssl' => [
        'allow_self_signed' => true,
        'verify_peer' => false,
        'verify_peer_name' => false,
    ],
    ],

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],
];