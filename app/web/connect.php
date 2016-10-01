<?php
$uri = "https://getpocket.com/v3/oauth/request";
// 参数数组
$data = array (
    'consumer_key' => '58985-37359df551b6a46182944f93', 
    'redirect_uri' => 'btc.xiaxiatao.com/callback.php' 
);
$redirect_uri = 'http://btc.xiaxiatao.com/callback.php';
 
$ch = curl_init ();
// print_r($ch);
curl_setopt ( $ch, CURLOPT_URL, $uri );
curl_setopt ( $ch, CURLOPT_POST, 1 );
curl_setopt ( $ch, CURLOPT_HEADER, 0 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true); // 从证书中检查SSL加密算法是否存在
curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
    'Content-Type: application/json; charset=UTF-8',
    "X-Accept: application/json") 
);
curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($data) );
$return = curl_exec ( $ch );
curl_close ( $ch );

$ret = json_decode($return,true);
$code = $ret['code'];
header("Location: https://getpocket.com/auth/authorize?request_token=$code&redirect_uri=$redirect_uri?code=$code");
?>
