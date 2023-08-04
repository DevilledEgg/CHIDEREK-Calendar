<?php
// This code accesses the previous file. //
include 'Calendar.php';
// $view value becomes the input of 'searchDate' //
$view = $_POST['searchDate'];
// The calendar will show $view, if nothing is set, then will show the current date. //
$calendar = new Calendar($view);
$calendar->add_event('Colour', '2023-09-03', 1, 'red');
$calendar->add_event('Colour', '2023-09-04', 1, 'orange');
$calendar->add_event('Colour', '2023-09-05', 1, 'yellow');
$calendar->add_event('Colour', '2023-09-06', 1, 'green');
$calendar->add_event('Colour', '2023-09-07', 1, 'blue');
$calendar->add_event('Colour', '2023-09-08', 1, 'purple');
$calendar->add_event('Colour', '2023-09-09', 1, 'pink');
$calendar->add_event('Colour', '2023-09-10', 1, 'grey');
$calendar->add_event('Colour', '2023-09-11', 1, 'black');

// Reading events from CSV file. //
// Defining the function. //
function readEventsFromCSV() {
    $file = fopen('calendar.csv', 'r');
    $events = array();
    while (($data = fgetcsv($file)) !== false) {
        $events[] = $data;
    }
fclose($file);
return $events;
}

// Aligning a variable to read the orders from the CSV file
$events = readEventsFromCSV();

// Loops through the events and printing each one into the calendar.
for ($i = 0; $i < count($events); $i++) {
	$calendar->add_event($events[$i][0], $events[$i][1], 1, 'green');
}

function readWorkDayFromCSV() {
    $file = fopen('workdays.csv', 'r');
    $workdays = array();
    while (($data = fgetcsv($file)) !== false) {
        $workdays[] = $data;
    }
fclose($file);
return $workdays;
}

$workdays = readWorkDayFromCSV();

for ($i = 0; $i < count($workdays); $i++) {
	$calendar->add_event($workdays[$i][0], $workdays[$i][1], 1, 'yellow');
}

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