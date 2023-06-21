<?php

return [
    'driver' => env('MAIL_DRIVER', 'sendmail'),
    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
    'port' => env('MAIL_PORT', 587),
    'from' => ['address' => 'yourEmail@gmail.com', 'name' => 'مجلة جامعة غزة للأبحاث والدراسات'],
    'encryption' => 'tls',
    'username' => env('research@gu.edu.ps'),
    'password' => env('11111111'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,
];
