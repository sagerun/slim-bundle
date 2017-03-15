<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 9:41
 */

use \Psr\Http\Message\ServerRequestInterface as  Request;
use \Psr\Http\Message\ResponseInterface as  Response;


$app->group('/pay',function () use($app){
  $con="App\\PayBundle\\Controllers\\";

  $this->get('',$con.'IndexController:index');

  $this->get('/',$con.'IndexController:index');

  $this->map(['GET'],'/alipay/wap',$con.'AlipayWapController:index')->setName('alipayWap');
  $this->map(['POST'],'/alipay/wap/payment',$con.'AlipayWapController:payment')->setName('alipayWapPayment');

  $this->map(['GET'],'/alipay/app',$con.'AlipayAppController:index')->setName('alipayApp');
  $this->map(['POST'],'/alipay/app/payment',$con.'AlipayAppController:payment')->setName('alipayAppPayment');

  $this->map(['GET'],'/alipay/f2f',$con.'AlipayF2FController:index')->setName('alipayF2F');
  $this->map(['POST'],'/alipay/f2f/payment',$con.'AlipayF2FController:payment')->setName('alipayF2FPayment');

  $this->map(['GET'],'/alipay/web',$con.'AlipayWebController:index')->setName('alipayWeb');
  $this->map(['POST'],'/alipay/web/payment',$con.'AlipayWebController:payment')->setName('alipayWebPayment');

});



$app->add(function (Request $request, Response $response, callable $next)use($app) {

  if(preg_match("/pay+[\/]?[a-zA-Z]*/",explode('/',$request->getUri()->getPath())[0])>0){

    $route = $request->getAttribute('route');

    if($route == null){

      $container = $app->getContainer();

      new \App\PayBundle\Middleware\InitRouteMiddleware($container);

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