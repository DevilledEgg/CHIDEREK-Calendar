<?php
include 'Calendar.php';
$view = $_POST['searchDate'];
$calendar = new Calendar($view);


// This small bit of code dumps the previously selected input (which is the ID) into a POST.
var_dump($_POST);
// Reading orders from CSV file. 
// Defining the function.
function readEventsFromCSV() {
    $file = fopen('calendar.csv', 'r');
    $events = array();
    while (($data = fgetcsv($file)) !== false) {
        $events[] = $data;
    }
fclose($file);
return $events;
}


    
 // Aliging a variable to read the orders from the CSV file
 $events = readEventsFromCSV();

  // Loops through the orders until the matching ID is found. We've seen this code in 'change_status.php'
  for ($i = 0; $i < count($events); $i++) {
	echo $events[$i][1];
	$calendar->add_event($events[$i][0], $events[$i][1], 1, 'green');
}



$calendar->add_event($name, $date, 1, 'green');
$calendar->add_event('Doctors', '2023-07-04', 1, 'red');
$calendar->add_event('Holiday', '2023-07-16', 7);
$calendar->add_event('Ava', $view);

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