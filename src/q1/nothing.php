<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../css/style.css"/>
	
		<title>Trolly Problem</title>
		<link href="../img/Logo%208.svg" rel="shortcut icon"/>
	</head>
	<body>
		<h1>Question 1</h1>
		<div class="image">
			<img src="../img/q1.jpg" style="width: 50vw;">
		</div>
		<p>You Did Nothing!</p>
		<?php
			echo $_COOKIE["name"];
		
			$dbconn = pg_connect("host=host.docker.internal port=5432 dbname=postgres user=postgres password=example");
			echo pg_query($dbconn, "SELECT * FROM users");
				
			pg_close($dbconn);
		?>
	</body>
</html>