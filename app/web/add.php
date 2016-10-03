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
	<script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>
<input id="url" type="text" />
<input id="title" type="text" />
<button id="add">Add</button>
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
			    } else {
			        alert(ret.msg);
			    }
			});
		});		
	})()
</script>
</body>
</html>