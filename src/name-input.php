<?php
	// Cookie time
	setcookie("name", $_POST["name"],0,"/");
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
		
		
	</body>
</html>
