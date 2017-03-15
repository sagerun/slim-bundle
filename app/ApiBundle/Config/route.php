<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 9:41
 */

use \Psr\Http\Message\ServerRequestInterface as  Request;
use \Psr\Http\Message\ResponseInterface as  Response;


$app->group('/api',function () use($app){
  $con="App\\ApiBundle\\Controllers\\";

  $this->get('',$con.'IndexController:index');

  $this->get('/',$con.'IndexController:index');
});



$app->add(function (Request $request, Response $response, callable $next) {
 
  if(preg_match("/api+[\/]?[a-zA-Z]*/",explode('/',$request->getUri()->getPath())[0])>0){

    $route = $request->getAttribute('route');

    if($route == null){
     
      $container = $next->getContainer();

      new \App\ApiBundle\Middleware\InitRouteMiddleware($container);

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