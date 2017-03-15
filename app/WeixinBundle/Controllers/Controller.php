<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 13:05
 */
namespace  App\WeixinBundle\Controllers;
  class Controller{

    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
        new    \App\WeixinBundle\Middleware\InitRouteMiddleware($container);
    }

    public function __get($property)
    {
        if ($this->container->{$property}) {
            return $this->container->{$property};
        }
    }

}