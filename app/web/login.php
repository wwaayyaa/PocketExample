<?php
session_start();

if($_SESSION['name'] && $_SESSION['access_token']){
	header("Location:/list.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
</head>
<body>
<a href="/connect.php">login</a>
</body>
</html>