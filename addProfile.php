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
    <title>New Employee</title>
</head>
<body>
<div class="container">
<form action="submitProfile.php" method=post>
<h2><b>Set up a Profile</b></h2>
<div class="row">
    <div class="col-25">
      <label for="fname">First Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="firstName" placeholder="e.g. Shaun" required>
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="lname">Last Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="lastName" placeholder="e.g. Nikola" required>
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="job">Occupation</label>
    </div>
    <div class="col-75">
      <input type="text" id="job" name="job" placeholder="e.g. Doctor" required>
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="status">Status</label>
    </div>
    <div class="col-75">
      <select id="status" name="status">
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
      <input type="time" id="clockIn" name="clockIn" required>
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="out">Clock Out</label>
    </div>
    <div class="col-75">
      <input type="time" id="clockOut" name="clockOut" required>
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="colour">Tag</label>
    </div>
    <div class="col-75">
      <select id="colour" name="colour">
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
      <label for="infomation">Extra Info <p><p><input type="submit" value="Submit"></label>
    </div>
    <div class="col-75">
      <input type="text" id="infomation" name="employeeInfo" placeholder="Write something...">
    </div>
</div>
</form>
<form action="profiles.php" method=post>
    <input class="cancel" type="submit" value="Cancel" style="background-color: grey"/>
</form>
</div>
</body>
</html>