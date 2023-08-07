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
    
    .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
    }
    .grid-item {
        background-color: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(0, 0, 0, 0.8);
        padding: 45px;
        font-size: 30px;
        text-align: center;
    }

    h1 {
        text-align: center;
    }

</style>
</div>
<html>
    <head>
        <title>Profiles</title>
    </head>
    <body>
        <h1>Current Employees</h1>

<?php

// Identifying the function with a variable. //
$profiles = readProfilesFromCSV();

$currentDate = date("Y-m-d");

// The function to read the orders from the CSV file. //
function readProfilesFromCSV() {
    // The variable $file now will open the CSV file and read it. //
    $file = fopen('profiles.csv', 'r'); // 'r' is just reading the file. //
    // The variable $events is now an array with nothing currently in it. //
    $profiles = array();
    // $data now holds the information in $file a.k.a CSV file. //
    // So when $data is equal to data in $file, $events (the array) now equals $data. //
    // Essentially $events has the CSV data now. //
    while (($data = fgetcsv($file)) !== false) {
        $profiles[] = $data;
    } 
fclose($file);
return $profiles;
}
    
    echo "<div class='grid-container'>";
    echo '<p>';

    
//echo "<div class='grid-container'>
//    <div class='grid-item'>1</div>
//    <div class='grid-item'>2</div>
//    <div class='grid-item'>3</div>  
//    <div class='grid-item'>4</div>
//    <div class='grid-item'>5</div>
//    <div class='grid-item'>6</div>  
//    <div class='grid-item'>7</div>
//    <div class='grid-item'>8</div>
//    <div class='grid-item'>9</div>  
//    </div>";

echo "
    <p><p><form action='addProfile.php' method='post'>
    <input type='submit' value = 'Add Profile'>
</form>";

echo "<form action='CHIDEREK.php' method='post'>
    <input type='hidden' name='searchDate' value=$currentDate>
    <input type='submit' value='Back to Calendar'>
    </form>";

// For each line of events, display it in the table and loop for all lines. //
// $event is a variable that can be used for one specific cell. //

foreach ($profiles as $profile) {   
    // Each data cell is put into the table in an allocated order. //
    echo "<p>";
    echo "<form action='presentProfile.php' method='post'>
            <input type='hidden' name='id' value=$profile[5]>
            <input type='submit' value= '$profile[3]'>
        </form>";
    echo $profile[1] . ', ';
    echo $profile[0];
    echo ' - [' . $profile[2] . '] ';

    
}

?>
</table>
</body>
</div>
</html>