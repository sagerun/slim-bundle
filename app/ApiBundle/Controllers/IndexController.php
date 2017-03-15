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
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
class IndexController extends   Controller{
 
  

public function  index(Request $request,Response $response){
dd($this->logger);
//    $log = new Logger('name');
//    $log->pushHandler(new StreamHandler('path/to/your.log', Logger::WARNING));
//
//// 添加日志记录
//    $log->addWarning('Foo');
//    $log->addError('Bar');

    $client = new \Predis\Client();
    $data= $this->db->table("user")->select()->limit(10)->get();
    $client->set('foo',json_encode($data));
    $value = $client->get('foo');
dump($value);exit;

    return    $response->withJson($data);
    return $this->view->render($response, 'Index/index.twig',[ ]);




}
    
}