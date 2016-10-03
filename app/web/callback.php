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
 
$return = Poster::post($uri, $data);
 
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
	<script type="text/javascript" src="jquery.min.js"></script> 
	<script type="text/javascript" src="bootstrap.min.js"></script> 
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.btc.com">BTC.com</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/list">List</a></li>
            <li><a href="/add">Add</a></li>
            <li><a href="/loginout">Sign Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<?php 
	if($access_token) { 
?>
    <div class="container" style="margin-top:50px;">
        <h2 >Welcome <?= $name ?>.</h2>
    </div>
<?php
	} else { 
?>
    <div class="container" style="margin-top:50px;">
        <h2 >Sign Fail.<a href="/login">Try Again</a></h2>
    </div>
<?php
	} 
?>
</body>
</html>