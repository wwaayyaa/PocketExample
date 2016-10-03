<?php
	session_start();
	$name = $_SESSION['name'];
	if(!$name){
		header("Location:/login");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="http://v3.bootcss.com/examples/signin/signin.css" rel="stylesheet" />
	<script type="text/javascript" src="jquery.min.js"></script>
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
            <li class="active"><a href="javascript:;">Add</a></li>
            <li><a href="/loginout">Sign Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <form class="form-signin" role="form">
        <h2 class="form-signin-heading">Add a Pocket</h2>
        <input id="url" type="url" class="form-control" placeholder="http://example.com" required="" autofocus="">
        <input id="title" type="text" class="form-control" placeholder="title" required="">
        <button id="add" class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
      </form>

    </div>

    <script type="text/javascript">
	    (function(){
		    $('#add').on('click',function(){
			    var data = {};
			    data.url = $('#url').val();
			    data.title = $('#title').val();
                var re = new RegExp(/http\:\/\/.+/i);
                if (!re.test(data.url)) {
                    return;
                }
			    $.post('/add_api', data, function (ret) {
			        console.log(ret);
			        if (ret.status == 1) {
			            alert(ret.msg);
                    } else {
			            alert(ret.msg);
			        }
			    });
		    });		
	    })()
    </script>
    <script src="http://v3.bootcss.com/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>