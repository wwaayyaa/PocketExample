<?php
require_once('../../vendor/autoload.php');
use PocketExample\Common\Poster;
use PocketExample\Config\Config;

	session_start();
	$name = $_SESSION['name'];
	$token = $_SESSION['access_token'];
    echo $name;
    if(!isset($_SESSION['access_token'])){
        header("Location:/login.php");
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
</head>
<body>
<table>
	<thead>
		<th><td>id</td><td>title</td><td>url</td><td>status</td></th>
	</thead>
	<?php 
	foreach ($list as $docket) {
	?>
	<tbody>
	<tr>
		<td><?= $docket['item_id'] ?></td>
		<td><?= $docket['given_title'] ?></td>
		<td>
			<?php if($docket['status'] == 0){ ?>
			<a href="/redirect.php?item_id=<?= $docket['item_id']?>&url=<?= urlencode($docket['given_url']) ?>" target="_blank">
			<?php }else{ ?>
			<a href="<?= $docket['given_url'] ?>" target="_blank">
			<?php } ?>
				<?= $docket['given_url'] ?>
			</a>
		</td>
		<td><?= $docket['status'] == 0 ? 'unread' : ($docket['status'] == 1 ? 'readed' : 'delete') ?></td>
	</tr></tbody>
	<?php
	}
	?>
</table>
</body>
</html>
