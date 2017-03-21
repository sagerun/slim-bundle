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
class UploadsController extends   Controller{
 
  

public function  uploadImg(Request $request,Response $response){
    header('Content-type:text/html;charset=utf-8');
    $base64_image_content = $request->getParsedBody()['imgbase64'];
//匹配出图片的格式
    if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
        $type = $result[2];

        $new_file = "/";
        if(!file_exists($new_file))
        {
//检查是否有该文件夹，如果没有就创建，并给予最高权限
            mkdir($new_file, 0700);
        }
        $new_file = $new_file.time().".{$type}";
        if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
            echo '新文件保存成功';
        }else{
            echo '新文件保存失败';
        }
    }

 
    return    $response->withJson($data);


}

    public function  MonitorInfo(Request $request,Response $response){
        $data=$request;
dump($request->getParsedBody());exit;
        return    $response->withJson($data);


    }
}