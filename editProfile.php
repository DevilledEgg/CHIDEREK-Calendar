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
    <title>Edit Employee</title>
</head>
<body>
<?php

function readProfilesFromCSV() {
    $file = fopen('profiles.csv', 'r');
    $profiles = array();
    while (($data = fgetcsv($file)) !== false) {
        $profiles[] = $data;
    }
fclose($file);
return $profiles;
}

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


?>
<div class="container">
<form action="updateProfile.php" method=post>
<h2><b>Editing <?php echo $profile[0]; echo ' '; echo $profile[1] ?></b></h2>
<div class="row">
    <div class="col-25">
      <label for="fname">First Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="firstName" value="<?php echo $profile[0]; ?>">
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="lname">Last Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="lastName" value="<?php echo $profile[1]; ?>">
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="job">Occupation</label>
    </div>
    <div class="col-75">
      <input type="text" id="job" name="job" value="<?php echo $profile[2]; ?>">
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="status">Status</label>
    </div>
    <div class="col-75">
      <select id="status" name="status" value="Sick">
            <option value = '<?php echo $profile[3]; ?>' " . ">Keep as <?php echo $profile[3]; ?></option>
            <option value = 'Avaliable' " . ">Avaliable</option>
            <option value = 'On Leave' " . ">On Leave</option>
            <option value = 'Sick' " . ">Sick</option>
            <option value = 'Unavaliable' " . ">Unavaliable</option>
      </select>
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="in">Clock In</label>
    </div>
    <div class="col-75">
      <input type="time" id="clockIn" name="clockIn" value="<?php echo $profile[6]; ?>">
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="out">Clock Out</label>
    </div>
    <div class="col-75">
      <input type="time" id="clockOut" name="clockOut" value="<?php echo $profile[7]; ?>">
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="colour">Tag</label>
    </div>
    <div class="col-75">
      <select id="colour" name="colour">
            <option value = "<?php echo $profile[4]; ?>" " . ">Keep as <?php echo $profile[4]; ?></option>
            <option value = 'red' " . ">Red</option>
            <option value = 'orange' " . ">Orange</option>
            <option value = 'yellow' " . ">Yellow</option>
            <option value = 'green' " . ">Green</option>
            <option value = 'blue' " . ">Blue</option>
            <option value = 'purple' " . ">Purple</option>
            <option value = 'pink' " . ">Pink</option>
            <option value = 'black' " . ">Black</option>
      </select>
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="infomation">Extra Info <p><p><input type="submit" value="Submit Changes"></label>
    </div>
    <div class="col-75">
      <input type="text" id="infomation" name="employeeInfo" value="<?php echo $profile[8]; ?>">,
      <input type="hidden" name="id" value="<?php echo $profile[5]; ?>" />
    </div>
</div>
</form>
<form action="profiles.php" method=post>
    <input class="cancel" type="submit" value="Cancel">
</form>
</div>
</body>
</html>