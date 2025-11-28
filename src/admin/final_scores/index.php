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
		<div class="results">
			<?php
				// connect to database
				$dbconn = pg_connect("host=host.docker.internal port=5432 dbname=postgres user=postgres password=example");
				
				// grab all users
				$result = pg_query($dbconn, "SELECT * FROM users ORDER BY score DESC");
				
				echo "<table><tr><th>Name</th><th></th><th>Score</th></tr>";
				
				while ($row = pg_fetch_row($result)) {
					echo "<tr>";
				  	echo "<td>$row[0]</td><td></td><td>$row[1]</td>";
					echo "</tr>";
				}
			
				echo "</table>";
			
			?>
		</div>
	</body>
</html>