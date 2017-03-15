<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 13:05
 */
namespace  App\WebBundle\Controllers;

use App\WebBundle\Models\User;
use \Psr\Http\Message\ServerRequestInterface as  Request;
use \Psr\Http\Message\ResponseInterface as  Response;
use Endroid\QrCode\QrCode;
class DemoController extends   Controller{

    


    //二维码
public function  qrcode(Request $request,Response $response){
    $qrCode = new QrCode();
    $time =date("YmdHis").time();
    $qrCode
        ->setText($time)
        ->setSize(300)
        ->setPadding(10)
        ->setErrorCorrection('high')
        ->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0])
        ->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0])
        ->setLabel($time)
        ->setLabelFontSize(16)
        ->setImageType(QrCode::IMAGE_TYPE_PNG);

    header('Content-Type: '.$qrCode->getContentType());
    $qrCode->render();
    $qrCode->save('uploads/web/codes/code'.$time.'.png');
    $response = new Response($qrCode->get(), 200, ['Content-Type' => $qrCode->getContentType()]);

    return $response;exit;
}

}