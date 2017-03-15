<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 9:41
 */

use \Psr\Http\Message\ServerRequestInterface as  Request;
use \Psr\Http\Message\ResponseInterface as  Response;
 
  $app->group('',function () use($app){
    $con="App\\WebBundle\\Controllers\\";

    $this->get('',$con.'IndexController:index');
    $this->get('/',$con.'IndexController:index');

      $this->get('/demo/qrcode',$con.'DemoController:qrcode');
  });



$app->add(function (Request $request, Response $response, callable $next)use($app) {

  if(preg_match("/(^api)|(^wap)|(^pay)|(^weixin)+/",explode('/',$request->getUri()->getPath())[0])<=0){

    $route = $request->getAttribute('route');

    if($route == null){

     $container = $app->getContainer();
        
      new \App\WebBundle\Middleware\InitRouteMiddleware($container);

      $container['errorHandler'] = function ($c) {
        return function ($request, $response, $exception) use ($c) {

          return  $c['view']->render($response, '500.twig',[ ]);
        };
      };

      $container['notAllowedHandler'] = function ($c) {
        return function ($request, $response, $methods) use ($c) {
          return $c['view']->render($response, '405.twig', []);
        };
      };

      $container['notFoundHandler'] = function ($c) {
        return function ($request, $response) use ($c) {

          return  $c['view']->render($response, '404.twig',[ ]);
        };
      };

    }


  }
    return $next($request, $response);
});