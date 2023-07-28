<?php
include 'Calendar.php';
$view = $_POST['searchDate'];
$calendar = new Calendar($view);
$calendar->add_event('Birthday', '2023-07-03', 1, 'green');
$calendar->add_event('Doctors', '2023-07-04', 1, 'red');
$calendar->add_event('Holiday', '2023-07-16', 7);
$calendar->add_event('Ava', '2023-07-06');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CHIDEREK Calendar</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href="calendar.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	    <nav class="navtop">
	    	<div>
	    		<h1>CHIDEREK Calendar</h1>
	    	</div>
	    </nav>
		<div class="content home">
			<?=$calendar?>
		</div>
	</body>
</html>