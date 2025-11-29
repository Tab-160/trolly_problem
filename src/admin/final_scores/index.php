<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/css/style.css"/>
	
		<title>Trolly Problem</title>
		<link href="/img/Logo%208.svg" rel="shortcut icon"/>
	</head>
	<body>
		<h1>Results!</h1>
		<br>
			<?php
				// connect to database
				$dbconn = pg_connect("host=host.docker.internal port=5432 dbname=postgres user=postgres password=example");
				
				// grab all users
				$result = pg_query($dbconn, "SELECT * FROM users ORDER BY score DESC");
				
				echo "<div class='results'><table><tr><th>Name</th><th></th><th>Score</th></tr>";
				
				// create the table of users
				while ($row = pg_fetch_row($result)) {
					echo "<tr>";
				  	echo "<td>$row[0]</td><td></td><td>$row[1]</td>";
					echo "</tr>";
				}
			
				echo "</table></div>";
			
				// Sum the scores of all users
				$total = pg_fetch_row(pg_query($dbconn, "SELECT SUM(score) FROM users"))[0];
				echo "<div class='results'><p>As a group, we killed $total total people. That's a lot.</p></div>";
			
			?>
	</body>
</html>