<?php
require_once('../../vendor/autoload.php');
use PocketExample\Common\Poster;
use PocketExample\Config\Config;
header('Content-Type:application/json');
	session_start();

	$name = $_SESSION['name'];
	$token = $_SESSION['access_token'];

	if(!isset($_SESSION['access_token'])){
		echo json_encode(array('status'=>0,'msg'=>'login expire'));
	}

	$url = $_POST['url'];
	$title = $_POST['title'];
	$time = time();
	$consumer_key = Config::$consumer_key;

	$data['url'] = $url;
	$data['title'] = $title;
	$data['time'] = $time;
	$data['consumer_key'] = $consumer_key;
	$data['access_token'] = $token;
	// var_dump($data);

	$uri = 'https://getpocket.com/v3/add';
    $return = Poster::post($uri, $data);
	$ret = json_decode($return, true);
	if($ret['status'] == 1){
		echo json_encode(array('status'=>1,'msg'=>'success'));
    }else{
		echo json_encode(array('status'=>0,'msg'=>'add fail'));
    }
?>