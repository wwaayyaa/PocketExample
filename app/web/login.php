<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<?php
$uri = "http://getpocket.com/v3/oauth/request";
// 参数数组
$data = array (
    'consumer_key' => '58985-37359df551b6a46182944f93', 
    'redirect_uri' => 'btc.xiaxiatao.com' 
);
 
$ch = curl_init ();
// print_r($ch);
curl_setopt ( $ch, CURLOPT_URL, $uri );
curl_setopt ( $ch, CURLOPT_POST, 1 );
curl_setopt ( $ch, CURLOPT_HEADER, 0 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_HTTPHEADER, array (
    'Content-Type: application/json; charset=UTF-8',
    "X-Accept: application/json",
    ) 
)
curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
$return = curl_exec ( $ch );
curl_close ( $ch );
 
print_r($return);

?>
</body>
</html>