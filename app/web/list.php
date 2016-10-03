<?php
require_once('../../vendor/autoload.php');
use PocketExample\Common\Poster;
use PocketExample\Config\Config;

	session_start();
	$name = $_SESSION['name'];
	$token = $_SESSION['access_token'];
    echo $name;
    if(!isset($_SESSION['access_token'])){
        header("Location:/login");
    }

	$data['consumer_key'] = Config::$consumer_key;
	$data['access_token'] = $token;
	$data['count'] = 100;
	$data['state'] = 'all';
	$uri = 'https://getpocket.com/v3/get';
	$return = Poster::post($uri, $data);
	$ret = json_decode($return, true);
    //var_dump($ret);
	$list = $ret['list'];

	// if($ret['status'] != 1){
	// 	exit("load docket fail");
	// }
?>
<!DOCTYPE html>
<html>
<head>
	<title>List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
	<script type="text/javascript" src="js/jquery.min.js"></script> 
	<script type="text/javascript" src="js/bootstrap.min.js"></script> 
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
            <li class="active"><a href="javascript:;">List</a></li>
            <li><a href="/add">Add</a></li>
            <li><a href="/loginout">Sign Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container" style="margin-top:50px;">
        <table class="table table-condensed">
	        <thead>
		        <th>id</th><th>title</th><th>resolved_title</th><th>url</th><th>status</th>
	        </thead>
	        <tbody>
	        <?php 
	        foreach ($list as $docket) {
	        ?>
	        <tr>
		        <td><?= $docket['item_id'] ?></td>
		        <td><?= $docket['given_title'] ?></td>
		        <td><?= $docket['resolved_title'] ?></td>
		        <td>
			        <?php if($docket['status'] == 0){ ?>
			        <a href="/redirect?item_id=<?= $docket['item_id']?>&url=<?= urlencode($docket['given_url']) ?>" target="_blank">
			        <?php }else{ ?>
			        <a href="<?= $docket['given_url'] ?>" target="_blank">
			        <?php } ?>
				        <?= $docket['given_url'] ?>
			        </a>
		        </td>
		        <?= $docket['status'] == 0 ? '<td style="color:red">unread</td>' : ($docket['status'] == 1 ? '<td style="color:green">read</td>' : '<td>delete</td>') ?>
	        </tr>
	        <?php
	        }
	        ?>
            </tbody>
        </table>
    </div>
</body>
</html>
