<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 13:05
 */
namespace  App\WapBundle\Controllers;

use App\WapBundle\Models\User;
use \Psr\Http\Message\ServerRequestInterface as  Request;
use \Psr\Http\Message\ResponseInterface as  Response;

class IndexController extends   Controller{

public function  index(Request $request,Response $response){

    $data= $this->db->table("user")->select()->limit(10)->get();
   
    return $this->view->render($response, 'Index/index.twig',["data"=>$data->toArray()]);

  
}

}