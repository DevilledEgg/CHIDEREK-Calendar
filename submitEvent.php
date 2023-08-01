<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipt</title>
</head>
<body>
<div>
<?php
    // This section gives the user inputs a home in some accurately named variables. //
    $eventDate = $_POST['date'];
    $eventName = $_POST['name'];
?>

<?php
    // The event ID is determined by the exact time. //
    $eventID = time();

    // If the user has left $eventName or $eventDate empty, the order will not send. //
    if(empty($eventDate) or empty($eventName)) {
        echo "<p>Name and date are required</p>";
        ?>
        </div>
        <p><b><a href="CHIDEREK.php" target="_self">Back</a></b></p>
        <?php
        echo "</body>";
        echo "</html>";
        exit;        
    }
    else {
        // Outputs a message indicating the success. //
        echo "Event created for <b>$eventName</b> on $eventDate";
        // This stores all the data that the user inputed into an array called $eventData.
        $eventData = array($eventName, $eventDate, $eventID );
    }

    // Function for writing array to CSV file. //
    // Remember they always come before the actual function. //
    writeEventDataToCSV($eventData);

    // This code is writing the array to a CSV file to it can be read easily. //
    function writeEventDataToCSV($eventData) {
        // The variable $file now will open the CSV file and put something at the end of it. //
        $file = fopen('calendar.csv', 'a'); // 'a' appends the line to the end of a file. //
        // 'fputcsv' is an action that will execute $file and $eventData will be used for the action. //
        // In this case, $eventData is going into calendar.csv //
        fputcsv($file, $eventData);
        fclose($file);
    }



?>
</body>
</div>
<p><b><a href="CHIDEREK.php" target="_self">Okay!</a></b></p>
</html>
