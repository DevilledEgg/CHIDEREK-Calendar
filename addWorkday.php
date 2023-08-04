<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Workday</title>
</head>
<body>
<?php
// Identifying the function with a variable. //
$profiles = readProfilesFromCSV();

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

?>

<form action='submitWorkday.php' method=post>
    <!-- The heading and two input boxes -->    
    <h2><b>Set up an Employee Workday</b></h2>
    Employee:
        <select name = 'employee'> 
        <?php
            foreach ($profiles as $profile) {   
                echo "<option value = '$profile[0]' " . ">$profile[0] $profile[1]</option>";
            }
        ?>
        </select><br>
        
        Date: <input type='date' name='date' min='2000-01-01' max='2999-12-31'/><br>


    <!-- Submit button that activates the next page -->
    <l><input type='submit' value='Confirm' style="background-color: white;
      color: black; padding: 5px 20px; border-radius: 10px; text-align: center; display: inline-block; border: 2px solid green; "/></l>
</form>
</body>
</html>