<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../css/style.css"/>
	
		<title>Trolly Problem</title>
		<link href="../img/Logo%208.svg" rel="shortcut icon"/>
	</head>
	<body>
		<h1>Question 3</h1>
		<div class="image">
			<img src="../img/q3.jpg" style="width: 50vw;">
		</div>
		<p>You Did Nothing!</p>
		<?php
			// grab the name of the user
			$name = $_COOKIE["name"];
			// connect to database
			$dbconn = pg_connect("host=host.docker.internal port=5432 dbname=postgres user=postgres password=example");
		
			// grab score of the current user and store as an int
			$result = pg_query($dbconn, "SELECT score FROM users WHERE name='$name'");
			$score = (int)pg_fetch_row($result)[0];
			
			// incriment score the correct amount
			$score += 1;
		
			// send score to the database
			pg_query($dbconn, "UPDATE users SET score=$score WHERE name='$name'");
			// and update the count
			pg_query($dbconn, "INSERT INTO questions(q_num, name, pulled_lever) VALUES (3, '$name', false);");

			pg_close($dbconn);
		?>
		<div class="options">
			<button onclick="location.href='../q4/';">Next Question</button>
		</div>
	</body>
</html>