<?php
	session_start();
	unset($_SESSION['name']);
	unset($_SESSION['access_token']);
	header("Location:/login.php");
?>