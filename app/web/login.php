<?php
session_start();

if($_SESSION['name'] && $_SESSION['access_token']){
	header("Location:/list");
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
        <h3 class="form-signin-heading">Sign Pocket</h3>
        <h5 class="form-signin-heading">- BTC example.</h5>
        <div style="clear:both;"></div>
        <a href="/connect" class="btn btn-lg btn-primary btn-block" >Sign In</a>
        <br />
        <div style="text-align:center;">author:WangYang 357466524@qq.com</div>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://v3.bootcss.com/assets/js/ie10-viewport-bug-workaround.js"></script>
  
</body>
</html>