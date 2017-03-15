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
class AlipayWebController extends   Controller{

    /**
     * @return \Omnipay\Common\GatewayInterface
     *
     *
     *
     */
  private function  init(){
      $gateway = Omnipay::create('Alipay_LegacyExpress');
      $config=array("sellerEmail"=>" ",
          "partner"=>" ",
          "key"=>" ",
         "returnUrl"=>"https://www.example.com/notify",
         "notifyUrl"=>"https://www.example.com/notify");
      $gateway->setSellerEmail($config['sellerEmail']);
      $gateway->setPartner($config['partner']);
      $gateway->setKey($config['key']);
      $gateway->setReturnUrl($config['returnUrl']);
      $gateway->setNotifyUrl($config['notifyUrl']);

      return $gateway;
  }

//测试手机版支付
public function  index(Request $request,Response $response){

    return $this->view->render($response, 'Index/alipay_web_test.twig');
}

//提交支付
public function payment(Request $request,Response $response){

    if($request->isPost()){
    $formData = $request->getParsedBody();
    $gateway = $this->init();
        $request = $gateway->purchase([
            'out_trade_no' => date('YmdHis').mt_rand(1000,9999),
            'subject'      =>  $formData['subtitle'],
            'total_fee'    => $formData['amount'],
        ]);

        /**
         * @var LegacyExpressPurchaseResponse $response
         */
        $response = $request->send();
//        dump($response);exit;
        $redirectUrl = $response->getRedirectUrl();
//or
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