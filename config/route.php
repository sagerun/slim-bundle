<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 9:41
 */

use \Psr\Http\Message\ServerRequestInterface as  Request;
use \Psr\Http\Message\ResponseInterface as  Response;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$app->get("/aaa",function(Request $request,Response $response,$args){
    $log = new  Logger('name');
    $log->pushHandler(new  StreamHandler('a.log', Logger::WARNING));
// dump($request->getParsedBody());exit;
// add records to the log
    $log->addWarning(json_encode($request->getQueryParams()));
    $log->addError(json_encode($request->getParsedBody()));
  //  return    $response->withJson(['error'=>'sorry!','status'=>'fail','code'=>'0000']);
});




