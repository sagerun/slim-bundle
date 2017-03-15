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
class WechatPayNativeController extends   Controller{
 
  private function  conf(){
      $gateway    = Omnipay::create('WechatPay_App');
      $gateway->setAppId("20152321321655");
      $gateway->setMchId("1231564564564");
      $gateway->setApiKey("264564654564");

      return $gateway;
  }

//测试手机版支付
public function  index(Request $request,Response $response){

    return $this->view->render($response, 'Index/index.twig');
}

//提交支付
public function payment(Request $request,Response $response){
    $gateway = $this->conf();
    if($request->isPost()) {
        $order = [
            'body'              => 'The test order',
            'out_trade_no'      => date('YmdHis').mt_rand(1000, 9999),
            'total_fee'         => 1, //=0.01
            'spbill_create_ip'  => 'ip_address',
            'fee_type'          => 'CNY'
        ];

        /**
         * @var Omnipay\WechatPay\Message\CreateOrderRequest $request
         * @var Omnipay\WechatPay\Message\CreateOrderResponse $response
         */
        $request  = $gateway->purchase($order);
        $response = $request->send();

//available methods
        $response->isSuccessful();
        $response->getData(); //For debug
        $response->getAppOrderData(); //For WechatPay_App
        $response->getJsOrderData(); //For WechatPay_Js
        $response->getCodeUrl(); //For Native Trade Type
    }
}

  //回调处理
public function Notify(Request $request,Response $response){
    $gateway = $this->conf();
    $response = $gateway->completePurchase([
        'request_params' => file_get_contents('php://input')
    ])->send();

    if ($response->isPaid()) {
        //pay success
        var_dump($response->getData());
    }else{
        //pay fail
    }
}

   //订单查询
    public function QueryOrder(Request $request,Response $response){
        $gateway = $this->conf();
        $response = $gateway->query([
            'transaction_id' => '1217752501201407033233368018', //The wechat trade no
        ])->send();

        var_dump($response->isSuccessful());
        var_dump($response->getData());
    }

    //关闭订单
    public function CloseOrder(Request $request,Response $response){
        $gateway = $this->conf();
        $response = $gateway->close([
            'out_trade_no' => '201602011315231245', //The merchant trade no
        ])->send();

        var_dump($response->isSuccessful());
        var_dump($response->getData());
   }


     //退款
    public function Refund(Request $request,Response $response){
        $gateway = $this->conf();
        $certPath='';
        $keyPath='';
        $outRefundNo='';
        $gateway->setCertPath($certPath);
        $gateway->setKeyPath($keyPath);

        $response = $gateway->refund([
            'transaction_id' => '1217752501201407033233368018', //The wechat trade no
            'out_refund_no' => $outRefundNo,
            'total_fee' => 1, //=0.01
            'refund_fee' => 1, //=0.01
        ])->send();

        var_dump($response->isSuccessful());
        var_dump($response->getData());
    }

//退款订单查询
public function QueryRefund(Request $request,Response $response){
    $gateway = $this->conf();
    $response = $gateway->queryRefund([
        'refund_id' => '1217752501201407033233368018', //Your site trade no, not union tn.
    ])->send();

    var_dump($response->isSuccessful());
    var_dump($response->getData());
}
    
}