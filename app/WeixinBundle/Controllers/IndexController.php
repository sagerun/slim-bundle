<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 13:05
 */
namespace  App\WeixinBundle\Controllers;

use App\WeixinBundle\Models\User;
use \Psr\Http\Message\ServerRequestInterface as  Request;
use \Psr\Http\Message\ResponseInterface as  Response;
use EasyWeChat\Foundation\Application;
class IndexController extends   Controller{

public function  index(Request $request,Response $response){


    $options = [
        'debug'     => true,
        'app_id'    => 'wx3cf0f39249eb0e60',
        'secret'    => 'f1c242f4f28f735d4687abb469072a29',
        'token'     => 'easywechat',
        'log' => [
            'level' => 'debug',
            'file'  => '/tmp/easywechat.log',
        ],
        // ...
    ];

    $app = new Application($options);

    $server = $app->server;
    $user = $app->user;

    $server->setMessageHandler(function($message) use ($user) {
        $fromUser = $user->get($message->FromUserName);

        return "{$fromUser->nickname} 您好！欢迎关注 overtrue!";
    });

    $server->serve()->send();

  
}

}