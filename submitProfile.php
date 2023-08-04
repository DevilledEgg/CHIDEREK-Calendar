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
    $profileFirstName = $_POST['firstName'];
    $profileLastName = $_POST['lastName'];
    $job = $_POST['job'];
    $status = $_POST['status'];
?>

<?php

    // The event ID is determined by the exact time. //
    $profileID = time();

    // If the user has left any of the input fields empty, the profile will not be added. //
    if(empty($profileFirstName) or empty($profileLastName) or empty($job) or empty($status)) {
        echo "<p>Please fill out all input fields.</p>";
        ?>
        </div>
        <p><b><a href="profiles.php" target="_self">Back</a></b></p>
        <?php
        echo "</body>";
        echo "</html>";
        exit;        
    }
    else {
        // Outputs a message indicating the success. //
        echo "Done!";
        // This stores all the data that the user inputed into an array called $eventData.
        $profileData = array($profileFirstName, $profileLastName, $job, $status, $profileID);
    }

    // Function for writing array to CSV file. //
    // Remember they always come before the actual function. //
    writeEventDataToCSV($profileData);

    // This code is writing the array to a CSV file to it can be read easily. //
    function writeEventDataToCSV($profileData) {
        // The variable $file now will open the CSV file and put something at the end of it. //
        $file = fopen('profiles.csv', 'a'); // 'a' appends the line to the end of a file. //
        // 'fputcsv' is an action that will execute $file and $eventData will be used for the action. //
        // In this case, $eventData is going into calendar.csv //
        fputcsv($file, $profileData);
        fclose($file);
    }



?>
</body>
</div>
<p><b><a href="profiles.php" target="_self">Okay!</a></b></p>
</html>
