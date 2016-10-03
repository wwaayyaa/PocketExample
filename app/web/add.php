<?php
	session_start();
	$name = $_SESSION['name'];
	if(!$name){
		header("Location:/login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
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
          <a class="navbar-brand" href="#">BTC.com</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/list.php">List</a></li>
            <li class="active"><a href="javascript:;">Add</a></li>
            <li><a href="/loginout.php">Sign Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <form class="form-signin" role="form">
        <h2 class="form-signin-heading">Add a Pocket</h2>
        <input id="url" type="text" class="form-control" placeholder="url" required="" autofocus="">
        <input id="title" type="text" class="form-control" placeholder="title" required="">
        <button id="add" class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
      </form>

    </div>


<!--<input id="url" type="text" />
<input id="title" type="text" />-->
<!--<button id="add">Add</button>-->
<script type="text/javascript">
	(function(){
		$('#add').on('click',function(){
			var data = {};
			data.url = $('#url').val();
			data.title = $('#title').val();
			$.post('/add_api.php', data, function (ret) {
			    console.log(ret);
			    if (ret.status == 1) {
			        alert(ret.msg);
			        $('#url').val('');
			        $('#title').val('');
                } else {
			        alert(ret.msg);
			    }
			});
		});		
	})()
</script>
</body>
</html>