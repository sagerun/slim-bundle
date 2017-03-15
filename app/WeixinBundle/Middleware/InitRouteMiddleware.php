<?php

namespace  App\WeixinBundle\Middleware;


class InitRouteMiddleware
{

    public function __construct($container)
    {
        $container['settings']['db']=require __DIR__."/../Config/db.php";
        $capsule = new \Illuminate\Database\Capsule\Manager;
        $capsule->addConnection($container['settings']['db']['mysql']);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        $container['parameter']=require __DIR__."/../Config/parameter.php";
        $container['db'] = function ($container) use ($capsule) {
            return $capsule;
        };
        require __DIR__ . "/../Config/dependency.php";
    }

    /**
     * Example middleware invokable class
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke($request, $response, $next)
    {

//        $response->getBody()->write('BEFORE');
        $response = $next($request, $response);
        //    $response->getBody()->write('AFTER');
        return $response;
    }
}