<?php
	// grab the name
	$name = $_POST["name"];

	// Cookie time
	setcookie("name", $name, 0, "/");

	// connect to database
	$dbconn = pg_connect("host=host.docker.internal port=5432 dbname=postgres user=postgres password=example");

	// add name to database
	pg_query($dbconn, "INSERT INTO users (name, score) VALUES ('$name', 0);");

	pg_close($dbconn);
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../css/style.css"/>
	
		<title>Trolly Problem</title>
		<link href="../img/Logo%208.svg" rel="shortcut icon"/>
	</head>
	<body>
		<h1>Welcome <?php echo $_POST["name"]; ?></h1>
        <div class="options">
			<button onclick="location.href='../q1/';">First Question</button>
		</div>
	</body>
</html>
