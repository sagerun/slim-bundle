<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 9:41
 */
use \Monolog as Monolog;
return [
    'settings'=>[
        'displayErrorDetails'=>true,
        'addContentLengthHeader'=>false,
        'determineRouteBeforeAppMiddleware' => true,
        'render'=>[
            'template_path'=>__DIR__.'/templates/',
        ],
        'logger'=>[
            'name'=>'s-app',
            'path'=>isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level'=>MonoLog\Logger::DEBUG
        ],
        'db'=> require __DIR__."/../config/db.php", 

    ]
];