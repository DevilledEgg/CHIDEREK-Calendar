<html>
    <style>
* {
    text-align: center;
}

a:link, a:visited {
  background-color: white;
  color: black;
  border: 2px solid green;
  border-radius: 5px;
  padding: 2px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: green;
  color: white;
}

    table, th, td {
        border:1px solid black;
        
    }

    table {
        width: 100%;
        text-align: center;
    }

    div {
        background-color:#ffffff;
        padding-top: 5px;
        padding-bottom: 10px;
        padding-left: 25px;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        margin: 10px auto;
        margin-top: 30px;
        width: 30%;
    }
</style>
<div>
<?php

// Aliging a variable to read the orders from the CSV file
$profiles = readProfilesFromCSV();

// Geting the profile ID from the submission
$profile_id = $_POST['id'];

// Finding the profile with the specific ID
$profile_index = null;
foreach($profiles as $i => $profile) {
    if ($profile[5] == $profile_id) {
        $profile_index = $i;
        break;
    }
}

if ($profile_index === null) {
    echo "Profile not found";
    exit;
}

// Updating the profile data with values from the previous form
$profiles[$profile_index][0] = $_POST['firstName'];
$profiles[$profile_index][1] = $_POST['lastName'];
$profiles[$profile_index][2] = $_POST['job'];
$profiles[$profile_index][3] = $_POST['status'];
$profiles[$profile_index][6] = $_POST['clockIn'];
$profiles[$profile_index][7] = $_POST['clockOut'];
$profiles[$profile_index][4] = $_POST['colour'];
$profiles[$profile_index][8] = $_POST['employeeInfo'];


// write the updated profiles back to the CSV file
writeProfilesToCSV($profiles);

echo "Profile updated successfully!";

// Reading profiles from CSV file. 
// Defining the function.
function readProfilesFromCSV() {
    $file = fopen('profiles.csv', 'r');
    $profiles = array();
    while (($data = fgetcsv($file)) !== false) {
        $profiles[] = $data;
    }
fclose($file);
return $profiles;
}

// Writing updated profiles to CSV file, replacing the previous ones. 
// Defining the function.
function writeProfilesToCSV($profiles) {
    $file = fopen('profiles.csv', 'w'); // replaces something
    foreach ($profiles as $profile) {
        fputcsv($file, $profile);
    }
    fclose($file);
    header("Location: profiles.php");
    exit();
}
?>
</body>
</div>
<p><a href="profiles.php" target="_self">Ok</a></p>
</html>
