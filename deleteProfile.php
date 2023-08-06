<?php

// This small bit of code dumps the previously selected input (which is the ID) into a POST.
var_dump($_POST);

// Checking to see if variable 'id' has been set in the post request.
if(isset($_POST['id'])) {
    // Now the ID has it's own variable.
    $id = $_POST['id'];
    
 // Aliging a variable to read the profiles from the CSV file
 $profiles = readProfilesFromCSV();

  // Loops through the profiles until the matching ID is found.
  for ($i = 0; $i < count($profiles); $i++) {
    if ($profiles[$i][5] == $id) {
        // Kill the line essentially.
        unset($profiles[$i]);
        break;
    }
}

 // reindex the array
 $profiles = array_values($profiles);
 // write the updated profiles back to the CSV file
writeProfilesToCSV($profiles);
}

// This line just makes sure that after the earlier function happens, it keeps us on the 'profiles' page.
header("Location: profiles.php");
exit();

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
}


?>