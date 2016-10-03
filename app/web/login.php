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
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="http://v3.bootcss.com/examples/signin/signin.css" rel="stylesheet" />
</head>
<body>

    <div class="container">

      <form class="form-signin" role="form" style="border: 1px solid #ddd;background-color: #fff;">
        <h3 class="form-signin-heading">Sign Pocket - BTC example.</h3>
        <a href="/connect.php" class="btn btn-lg btn-primary btn-block" >Sign In</a>
        <small>357466524@qq.com</small>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://v3.bootcss.com/assets/js/ie10-viewport-bug-workaround.js"></script>
  
</body>
</html>