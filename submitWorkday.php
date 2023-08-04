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
    $employee = $_POST['employee'];
    $date = $_POST['date'];
    $currentDate = date("Y-m-d");
?>

<?php

    // The event ID is determined by the exact time. //
    $workDayID = time();

    // If the user has left any of the input fields empty, the profile will not be added. //
    if(empty($employee) or empty($date)) {
        echo "<p>Please fill out all input fields.</p>";
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
        echo "Done!";
        // This stores all the data that the user inputed into an array called $eventData.
        $workDayData = array($employee, $date, $workDayID);
    }

    // Function for writing array to CSV file. //
    // Remember they always come before the actual function. //
    writeWorkDayDataToCSV($workDayData);

    // This code is writing the array to a CSV file to it can be read easily. //
    function writeWorkDayDataToCSV($workDayData) {
        // The variable $file now will open the CSV file and put something at the end of it. //
        $file = fopen('workdays.csv', 'a'); // 'a' appends the line to the end of a file. //
        // 'fputcsv' is an action that will execute $file and $eventData will be used for the action. //
        // In this case, $eventData is going into calendar.csv //
        fputcsv($file, $workDayData);
        fclose($file);
    }



?>
</body>
</div>
<?php
    echo "<p><form action='CHIDEREK.php' method='post'>
    <input type='hidden' name='searchDate' value=$currentDate>
    <input type='submit' value='Okay!'>
    </form>";
?>
</html>
