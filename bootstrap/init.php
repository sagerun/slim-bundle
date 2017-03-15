<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/10
 * Time: 11:39
 */


require __DIR__."/../vendor/slim/slim/Slim/App.php";

session_start();

$setting['app'] = require __DIR__."/../config/setting.php";

$app = new Slim\App($setting['app']);

require __DIR__."/../config/route.php";

require __DIR__."/../config/bundle.php";
 
$app->run();

