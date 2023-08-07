<style>
    h1 {
        display: block;
        font-size: 2em;
        margin-left: 0;
        margin-right: 0;
        font-weight: bold;
    }
    t {
        display: block;
        font-size: 1.3em;
    }

    div {
        background-color:#ffffff;
        padding-top: 5px;
        padding-bottom: 10px;
        padding-left: 25px;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        margin: 10px auto;
        width: 60%;
    }

    h1 {
        text-align: center;
    }

</style>
<div>
<html>
    <head>
        <title>Day Information</title>
    </head>
    <body>
        <h1><?php $dayDate = $_POST['presentDate']; echo $dayDate ?></h1>

<?php

// Identifying the function with a variable. //
$events = readEventsFromCSV();

$currentDate = date("Y-m-d");

// The function to read the events from the CSV file. //
function readEventsFromCSV() {
    // The variable $file now will open the CSV file and read it. //
    $file = fopen('calendar.csv', 'r'); // 'r' is just reading the file. //
    // The variable $events is now an array with nothing currently in it. //
    $events = array();
    // $data now holds the information in $file a.k.a CSV file. //
    // So when $data is equal to data in $file, $events (the array) now equals $data. //
    // Essentially $events has the CSV data now. //
    while (($data = fgetcsv($file)) !== false) {
        $events[] = $data;
    } 
fclose($file);
return $events;
}    

$workdays = readWorkDayFromCSV();

// The function to read the workdays from the CSV file. //
function readWorkDayFromCSV() {
    // The variable $file now will open the CSV file and read it. //
    $file = fopen('workdays.csv', 'r'); // 'r' is just reading the file. //
    // The variable $workdays is now an array with nothing currently in it. //
    $workdays = array();
    // $data now holds the information in $file a.k.a CSV file. //
    // So when $data is equal to data in $file, $workdays (the array) now equals $data. //
    // Essentially $workdays has the CSV data now. //
    while (($data = fgetcsv($file)) !== false) {
        $workdays[] = $data;
    } 
fclose($file);
return $workdays;
}  

echo "<form action='CHIDEREK.php' method='post'>
    <input type='hidden' name='searchDate' value=$currentDate>
    <input type='submit' value='Back to Calendar'>
</form>";

echo "<h2>Events:</h2>";
for ($i = 0; $i <count($events); $i++) {
    if ($events[$i][1] == $dayDate) { 
        echo $events[$i][0] . '<p>';
    }
}

echo "<h2>Employees:</h2>";
for ($i = 0; $i <count($workdays); $i++) {
    if ($workdays[$i][2] == $dayDate) { 
        echo $workdays[$i][0] . ' ' . $workdays[$i][1];
        echo '<i> - [' . $workdays[$i][3] . ']</i><p>';
        echo $workdays[$i][6] . ' - ' . $workdays[$i][7] . '<p>';
    }
}



?>
</table>
</body>
</div>
</html>