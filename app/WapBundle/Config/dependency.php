<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 9:41
 */


$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig(__DIR__.'/../Resource/Views/templates', [
        'cache' => __DIR__.'/../Cache/views',
        "debug"=>true
    ]);
    $view->addExtension(new \Slim\Views\TwigExtension(
        $c->router,
        $c->request->getUri()
    ));
    $view->addExtension(new \Twig_Extension_Debug());

    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));

    return $view;
};


$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

return $container;
