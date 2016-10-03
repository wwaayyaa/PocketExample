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

      <form class="form-signin" role="form">
        <h3 class="form-signin-heading">Please sign in</h3>
        <a href="/connect.php" class="btn btn-lg btn-primary btn-block" >Sign In</a>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://v3.bootcss.com/assets/js/ie10-viewport-bug-workaround.js"></script>
  
</body>
</html>