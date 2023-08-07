<!DOCTYPE html>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 80%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
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

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row::after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
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
<div class="row">
    <div class="col-25">
      <label for="status">Employee:</label>
    </div>
    <div class="col-75">
      <select id="employeeID" name="employeeID" required>
        <?php
            foreach ($profiles as $profile) {  
                if ($profile[3] == 'Avaliable') {
                    echo "<option value = '$profile[5]' " . ">$profile[0] $profile[1]</option>";
                }
            }
        ?>
      </select>
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="job">Date:</label>
    </div>
    <div class="col-75">
      <input type="date" id="date" name="date" min='2000-01-01' max='2999-12-31' required>
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="in">Clock In</label>
    </div>
    <div class="col-75">
      <input type="time" id="clockIn" name="clockIn">
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="in">Clock Out</label>
    </div>
    <div class="col-75">
      <input type="time" id="clockOut" name="clockOut">
    </div>
</div>
<i>Leaving Clock In and Clock Out blank will use the employees set regular hours.

    <!-- Submit button that activates the next page -->
    <p><input type='submit' value='Confirm' />
</form>
<form action="profiles.php" method=post>
    <input class="cancel" type="submit" value="Cancel" style="background-color: grey"/>
</form>
</body>
</html>