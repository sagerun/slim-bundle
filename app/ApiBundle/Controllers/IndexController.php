<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 13:05
 */
namespace  App\ApiBundle\Controllers;

use \Psr\Http\Message\ServerRequestInterface as  Request;
use \Psr\Http\Message\ResponseInterface as  Response;

class IndexController extends   Controller{
 
  

public function  index(Request $request,Response $response){

    $client = new \Predis\Client();
    $data= $this->db->table("user")->select()->limit(10)->get();
    $client->set('foo',json_encode($data));
    $value = $client->get('foo');
dump($value);exit;

    return    $response->withJson($data);
    return $this->view->render($response, 'Index/index.twig',[ ]);




}
    
}