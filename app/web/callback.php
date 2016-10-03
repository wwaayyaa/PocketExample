<?php
require_once('../../vendor/autoload.php');
use PocketExample\Common\Poster;
use PocketExample\Config\Config;
$uri = "https://getpocket.com/v3/oauth/authorize";
$request_token = $_GET['code'];
// 参数数组
$data = array (
    'consumer_key' => Config::$consumer_key, 
    'code' => $request_token 
);
 
Poster::post($uri, $data);
 
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