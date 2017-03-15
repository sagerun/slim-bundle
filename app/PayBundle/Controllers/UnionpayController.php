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
class UninonPayController extends   Controller{
 
public function init(){
    dump($this);exit;
    $gateway    = Omnipay::create('UnionPay_Express');
    $config=array("merId"=>"",
        "certPath"=>"",
        "certPassword"=>"",
        "returnUrl"=>"",
        "notifyUrl"=>"");
    $gateway->setMerId($config['merId']);
    $gateway->setCertPath($config['certPath']); // .pfx file
    $gateway->setCertPassword($config['certPassword']);
    $gateway->setCertDir($config['certDir']); //The directory contain *.cer files
    $gateway->setReturnUrl($config['returnUrl']);
    $gateway->setNotifyUrl($config['notifyUrl']);
    return $gateway;
}

//测试手机版支付
public function  index(Request $request,Response $response){

    return $this->view->render($response, 'Index/index.twig');
}

//提交支付
public function payment(Request $request,Response $response){

    if($request->isPost()){
        $gateway = $this->init();
        $order = [
            'orderId'   => date('YmdHis'), //Your order ID
            'txnTime'   => date('YmdHis'), //Should be format 'YmdHis'
            'orderDesc' => 'My order title', //Order Title
            'txnAmt'    => '100', //Order Total Fee
        ];

        $response = $gateway->purchase($order)->send();

        $response->getRedirectHtml(); //For PC/Wap
        $response->getTradeNo(); //For APP
    }
}

//回调
public function Notify(Request $request,Response $response){
    $gateway = $this->init();
    $response = $gateway->completePurchase(['request_params'=>$_REQUEST])->send();
    if ($response->isPaid()) {
        //pay success
    }else{
        //pay fail
    }
}

//查询订单状态
    public function QueryStatus(Request $request,Response $response){
        $gateway = $this->init();
        $pay = $gateway->Omnipay;
        $response =$pay::queryStatus([
            'orderId' => '20150815121214', //Your site trade no, not union tn.
            'txnTime' => '20150815121214', //Order trade time
            'txnAmt'  => '200', //Order total fee
        ])->send();

        var_dump($response->isSuccessful());
        var_dump($response->getData());
    }

   //交易撤销
    public function ConsumeUndo(Request $request,Response $response){
        $gateway = $this->init();
        $response = $gateway->consumeUndo([
            'orderId' => '20150815121214', //Your site trade no, not union tn.
            'txnTime' => date('YmdHis'), //Regenerate a new time
            'txnAmt'  => '200', //Order total fee
            'queryId' => 'xxxxxxxxx', //Order total fee
        ])->send();

        var_dump($response->isSuccessful());
        var_dump($response->getData());
    }


    //退款
    public function Refund(Request $request,Response $response ){
        $gateway = $this->init();
        $response = $gateway->refund([
            'orderId' => '20150815121214', //Your site trade no, not union tn.
            'txnTime' => '20150815121214', //Order trade time
            'txnAmt'  => '200', //Order total fee
        ])->send();

        var_dump($response->isSuccessful());
        var_dump($response->getData());
    }



}