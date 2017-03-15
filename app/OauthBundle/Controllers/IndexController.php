<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 13:05
 */
namespace  App\OauthBundle\Controllers;

use App\OauthBundle\Models\User;
use \Psr\Http\Message\ServerRequestInterface as  Request;
use \Psr\Http\Message\ResponseInterface as  Response;
class IndexController extends   Controller{

public function  index(Request $request,Response $response){

 echo 23;
  
}

}