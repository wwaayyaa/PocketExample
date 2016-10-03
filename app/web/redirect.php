<?php
require_once('../../vendor/autoload.php');
use PocketExample\Config\Config;
	session_start();

	$name = $_SESSION['name'];
	$token = $_SESSION['access_token'];
	echo 'please wait :)';
	if(!isset($_SESSION['access_token'])){
		header("Location:/login");
	}
	$consumer_key = Config::$consumer_key;

	$data['consumer_key'] = $consumer_key;
	$data['access_token'] = $token;
	$item_id = $_GET['item_id'];
	$url = $_GET['url'];
	$data['actions'] = json_encode(array(array('action'=>'archive','item_id'=>$item_id,'item'=>time())));
	$d = http_build_query($data);
	// var_dump($d);
	$uri = 'https://getpocket.com/v3/send?'.$d;
	$ch = curl_init ();
	// print_r($ch);
	curl_setopt ( $ch, CURLOPT_URL, $uri );
	curl_setopt ( $ch, CURLOPT_POST, 0 );
	curl_setopt ( $ch, CURLOPT_HEADER, 0 );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, true);
	
	$return = curl_exec ( $ch );
	curl_close ( $ch );
	// var_dump($return);
	$ret = json_decode($return, true);
	if($ret['status'] == 1){
		header("refresh:0;url=$url");
	}else{

	}
	// $list = $ret['list'];


?>
