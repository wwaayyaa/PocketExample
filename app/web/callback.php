<?php
$uri = "https://getpocket.com/v3/oauth/authorize";
$request_token = $_GET['code'];
// 参数数组
$data = array (
    'consumer_key' => '58985-37359df551b6a46182944f93', 
    'code' => $request_token 
);
 
$ch = curl_init ();
// print_r($ch);
curl_setopt ( $ch, CURLOPT_URL, $uri );
curl_setopt ( $ch, CURLOPT_POST, 1 );
curl_setopt ( $ch, CURLOPT_HEADER, 0 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查 
curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, true); // 从证书中检查SSL加密算法是否存在
curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
    'Content-Type: application/json; charset=UTF-8',
    "X-Accept: application/json") 
);
curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($data) );
$return = curl_exec ( $ch );
curl_close ( $ch );
 
// print_r($return);
$ret = json_decode($return, true);
$access_token = $ret['access_token'];
$name = $ret['username'];
session_start();
$_SESSION['name'] = $name;
$_SESSION['access_token'] = $access_token;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Callback</title>
</head>
<body>
<?php 
	if($access_token) { 
		echo "认证成功"; 
?>
	<a href="/add.php">添加</a>
	<a href="/list.php">列表</a>
<?php
	} else { 
		echo "认证失败";
	} 
?>
</body>
</html>