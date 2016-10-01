<?php
	session_start();

	$name = $_SESSION['name'];
	$token = $_SESSION['access_token'];

	if(!isset($_SESSION['access_token'])){
		echo json_encode(array('status'=>0,'login expire'));
	}

	$url = $_POST['url'];
	$title = $_POST['title'];
	$time = time();
	$consumer_key = '58985-37359df551b6a46182944f93';

	$data['url'] = $url;
	$data['title'] = $title;
	$data['time'] = $time;
	$data['consumer_key'] = $consumer_key;
	$data['access_token'] = $token;

	$uri = 'https://getpocket.com/v3/add';
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

	echo $return;
?>