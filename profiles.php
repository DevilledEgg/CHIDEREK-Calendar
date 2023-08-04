<html>
    <head>
        <title>Profiles</title>
    </head>
    <body>
        <h1>Employees</h1>
        <!-- A table -->
        <table>
            
            <!-- Table Heading -->
            <tr> 
                <th>First Name</th>
                <th>Last Name</th>
                <th>Occupation</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>


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

echo "
    <form action='addProfile.php' method='post'>
    <input type='submit' value = 'Add Profile'>
</form><p>";

// For each line of events, display it in the table and loop for all lines. //
// $event is a variable that can be used for one specific cell. //
foreach ($profiles as $profile) {   
    // Each data cell is put into the table in an allocated order. //
    echo "<tr>";
    echo "<td>" . $profile[0] . "</td>";
    echo "<td>" . $profile[1] . "</td>";
    echo "<td>" . $profile[2] . "</td>";
    echo "<td>" . $profile[3] . "</td>";
}

?>
</table>
</body>
<?php
    echo "<p><form action='CHIDEREK.php' method='post'>
    <input type='hidden' name='searchDate' value=$currentDate>
    <input type='submit' value='Okay!'>
    </form>";
?>
</html>