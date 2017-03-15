<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 13:05
 */
namespace  App\PayBundle\Controllers;

use \Psr\Http\Message\ServerRequestInterface as  Request;
use \Psr\Http\Message\ResponseInterface as  Response;
use \Omnipay\Omnipay;
class AlipayWapController extends   Controller{
 
  private function  init(){
      $gateway = Omnipay::create('Alipay_AopWap');
      $config=array("appId"=>"2016080300156118",
          "privateKey"=>"MIICXgIBAAKBgQCaBXclOQNhJpki0JSjwOiDrsbhP7fYOxCe135mub8r3Ilgqt0j
    SpHvaulC0bsmoKs5USYUOjatkL4FzBaAKd/tx2r+V5MCfDL/D7sAp0Q9teTKdAG3
4xRBjROR3JGpEpVxdUGOqiMg1+s/XDNEp2wypi/913E8QFtOAlW8wkVNxwIDAQAB
AoGBAJQ+pHIQUR9mDkkDJ74BhAqS49uT/7jBCPtKAOCQ8d8esp93dcdtE8+0QHXO
9mp0hLlzUMpxSYV/ZlagHBwZsexmFtEjm86+dl2DZa2nXLEwpDYOyyySMAbeM8B2
xEQ+hm5e4WN6R7X4zvsupA0voNAZh11fj3Kf+ViU0uvtNJzhAkEAyVQwVZJnrjYF
EpsIpl21WM3Fev8QblvO03cMpwtHvpHUXuSza/YCSw7AVUI2Q4zEosSxWzx9Yiui
1VydFc/nMQJBAMPYl7A86UCiMbc1whRQg//e7vrt1kvrQEIEEFEdczwVQYQvH/ge
jHQocwH2BTUPIRbIsO5TMvcGFHdYa4uEtncCQQC8ysXIeNHg+6cmG1uxJo64B733
6NdvpYf9pNWoj1tnyThtA+l8g+UCnYKecMiR7581Q11NQRwSwvifO4nSunMBAkAC
7PJfJJnLaGDbvsbWbNl78gWZ5AGmgq4kDlF8FLeK9zpSUi3lE/e/KHeHWPh88Wvq
HjdeaAnD3OhjXAPHQsVDAkEAwGlRlN+5351ftuah14XmwoiNtE82sZGvpckmzcRg
NPtRcwt5Z6ZaT6CKbWpzMXiJcKBVnzLr/r5D/MNVaMq2vQ==",
          "alipayPublicKey"=>"MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIgHnOn7LLILlKETd6BFRJ0GqgS2Y3mn1wMQmyh9zEyWlz5p1zrahRahbXAfCfSqshSNfqOmAQzSHRVjCqjsAw1jyqrXaPdKBmr90DIpIxmIyKXv4GGAkPyJ/6FTFY99uhpiq0qadD/uSzQsefWo0aTvP/65zi3eof7TcZ32oWpwIDAQAB",
         "notifyUrl"=>"https://www.example.com/notify");
      $gateway->setAppId($config['appId']);
      $gateway->setPrivateKey($config['privateKey']);
      $gateway->setAlipayPublicKey($config['alipayPublicKey']);
      $gateway->setNotifyUrl($config['notifyUrl']);
      $gateway->sandbox();
      return $gateway;
  }

//测试手机版支付
public function  index(Request $request,Response $response){

    return $this->view->render($response, 'Index/alipay_wap_test.twig');
}

//提交支付
public function payment(Request $request,Response $response){

    if($request->isPost()){
    $formData = $request->getParsedBody();
    $gateway = $this->init();
    $request = $gateway->purchase();
    $request->setBizContent([
        'out_trade_no' => date('YmdHis') . mt_rand(1000, 9999),
        'total_amount' =>  $formData['amount'],
        'subject'      =>  $formData['subtitle'],
        'product_code' => 'QUICK_WAP_PAY',
    ]);

    $response = $request->send();
    $redirectUrl = $response->getRedirectUrl();
    $response->redirect();
    }else{

        return    $response->withJson(array("status"=>"fail","msg"=>"no input!","statusCode"=>100));

    }
}

//回调
public function Notify(Request $request,Response $response){
    $gateway = $this->init();
    $request = $gateway->completePurchase();
    $request->setParams(array_merge($_POST, $_GET)); //Don't use $_REQUEST for may contain $_COOKIE

    /**
     * @var AopCompletePurchaseResponse $response
     */
    try {
        $response = $request->send();

        if($response->isPaid()){

            echo '支付成功!';

        }else{

            echo '支付失败!';

        }
    } catch (Exception $e) {

       echo '失败！';

    }
}
    
}