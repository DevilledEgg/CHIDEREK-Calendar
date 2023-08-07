<!DOCTYPE html>
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
        padding-top: 50px;
        padding-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        margin: 100px auto;
        width: 60%;
        text-align: center;
    }

    input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

</style>

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
    $clockIn = $_POST['clockIn'];
    $clockOut = $_POST['clockOut'];
    $colour = $_POST['colour'];
    $employeeInfo = $_POST['employeeInfo'];
?>

<?php

    // The event ID is determined by the exact time. //
    $profileID = time();

    // If the user has left any of the input fields empty, the profile will not be added. //
    if(empty($profileFirstName) or empty($profileLastName) or empty($job) or empty($status) or empty($clockIn) or empty($clockOut)) {
        echo "<p>Please fill out all input fields.</p>";
        echo "<form action='addprofile.php' method='post'>
        <input type='submit' value='Try Again'>
        </form>";
        echo "<p><form action='profiles.php' method='post'>
        <input type='submit' value='Cancel' style='background-color: grey'>
        </form>";
        echo "</body>";
        echo "</html>";
        exit;        
    }
    else {
        // Outputs a message indicating the success. //
        echo "Done!";
        // This stores all the data that the user inputed into an array called $eventData.
        $profileData = array($profileFirstName, $profileLastName, $job, $status, $colour, $profileID, $clockIn, $clockOut, $employeeInfo);
       
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
        header("Location: profiles.php");
        exit();
    }



?>
</body>
</div>
<p><b><a href="profiles.php" target="_self">Okay!</a></b></p>
</html>
