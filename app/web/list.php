<?php
	session_start();

	$name = $_SESSION['name'];
	$token = $_SESSION['access_token'];
	echo $name;
	if(!isset($_SESSION['access_token'])){
		header("Location:/login.php");
	}
	$consumer_key = '58985-37359df551b6a46182944f93';

	$data['consumer_key'] = $consumer_key;
	$data['access_token'] = $token;
	$data['count'] = 100;
	$data['state'] = 'all';
	$uri = 'https://getpocket.com/v3/get';
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
	$ret = json_decode($return, true);
	var_dump($ret);
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
