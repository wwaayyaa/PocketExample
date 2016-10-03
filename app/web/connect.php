<?php
require_once('../../vendor/autoload.php');
use PocketExample\Common\Poster;
use PocketExample\Config\Config;
$uri = "https://getpocket.com/v3/oauth/request";
// 参数数组
$data = array (
    'consumer_key' => Config::$consumer_key, 
    'redirect_uri' => 'btc.xiaxiatao.com/callback.php' 
);
$redirect_uri = 'http://btc.xiaxiatao.com/callback.php';

$return = Poster::post($uri, $data);

$ret = json_decode($return,true);
$code = $ret['code'];
header("Location: https://getpocket.com/auth/authorize?request_token=$code&redirect_uri=$redirect_uri?code=$code");
?>
