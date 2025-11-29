<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../css/style.css"/>
	
		<title>Trolly Problem</title>
		<link href="../img/Logo%208.svg" rel="shortcut icon"/>
	</head>
	<body>
		<h1>Question 9</h1>
		<div class="image">
			<img src="../img/q9.jpg" style="width: 50vw;">
		</div>
		<p>You Pulled the Lever!</p>
		<?php
			// connect to database
			$dbconn = pg_connect("host=host.docker.internal port=5432 dbname=postgres user=postgres password=example");
		
		
			//grab pulled lever amount
			$num_pulled_query = pg_query($dbconn, "SELECT COUNT(name) FROM questions WHERE q_num=9 AND pulled_lever=true");
			$num_not_pulled_query = pg_query($dbconn, "SELECT COUNT(name) FROM questions WHERE q_num=9 AND pulled_lever=false");

			$num_pulled = (int)pg_fetch_row($num_pulled_query)[0];
			$num_not_pulled = (int)pg_fetch_row($num_not_pulled_query)[0];
			
			// grab the name of the user
			$name = $_COOKIE["name"];
		
			// grab score of the current user and store as an int
			$result = pg_query($dbconn, "SELECT score FROM users WHERE name='$name'");
			$score = (int)pg_fetch_row($result)[0];
			
			// find out how many people to kill
		
			if ($num_pulled > $num_not_pulled) {
				$score += 13;
			} else {
				$score += 1;
			}
		
			// send score to the database
			pg_query($dbconn, "UPDATE users SET score=$score WHERE name='$name'");
			// and update the count
			pg_query($dbconn, "INSERT INTO questions(q_num, name, pulled_lever) VALUES (9, '$name', true);");

			pg_close($dbconn);
		?>
	</body>
</html>