<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../../css/style.css"/>
	
		<title>Trolly Problem</title>
		<link href="../../img/Logo%208.svg" rel="shortcut icon"/>
		
		<!-- https://developers.google.com/chart/interactive/docs/gallery/piechart -->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
		  	google.charts.load('current', {'packages':['corechart']});
		  	google.charts.setOnLoadCallback(drawChart);

			function drawChart() {

			/*var data = google.visualization.arrayToDataTable([
			  ['Task', 'Hours per Day'],
			  ['Work',     11],
			  ['Eat',      2],
			  ['Commute',  2],
			  ['Watch TV', 2],
			  ['Sleep',    7]
			]);*/
				// build the table (see comment above for output formatting)
				var data = google.visualization.arrayToDataTable([
					['Option', 'Number of people'],
					<?php
						// connect to database
						$dbconn = pg_connect("host=host.docker.internal port=5432 dbname=postgres user=postgres password=example");
					
						//grab pulled lever amount
						$num_pulled_query = pg_query($dbconn, "SELECT COUNT(name) FROM questions WHERE q_num=6 AND pulled_lever=true");
						$num_not_pulled_query = pg_query($dbconn, "SELECT COUNT(name) FROM questions WHERE q_num=6 AND pulled_lever=false");
					
						$num_pulled = (int)pg_fetch_row($num_pulled_query)[0];
						$num_not_pulled = (int)pg_fetch_row($num_not_pulled_query)[0];
					
						// create output
						$output = "['Pulled Lever', 		$num_pulled], " . PHP_EOL . "					['Didn`t Pull Lever',	$num_not_pulled]" . PHP_EOL;
						
						echo $output;
					
					?>
				]);
			 
				var options = {
          			backgroundColor: "#C1D7C1"
        		};

				var chart = new google.visualization.PieChart(document.getElementById('piechart'));

				chart.draw(data, options);
		  	}
		</script>
	</head>
	<body>
		<h1>Question 6</h1>
		<div class="image">
			<img src="../../img/q6.jpg" style="width: 50vw;">
		</div>
		<div class="piechart">
			<div id="piechart" style="width: 50vh; height: 50vh;"></div>
		</div>
		<br>
		<div class="options">
			<button onclick="location.href='../q7/';">Next Question</button>
		</div>
	</body>
</html>