<?php
return [
    "mysql"=>[
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'test',
        'username' => 'root',
        'password' => '123456',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => ''
    ],
    "redis"=>[
        'cluster' => false,
        'default' => [
            'host' => '127.0.0.1',
            'port' => 6379,
            'database' => 0,
        ],
    ]
];