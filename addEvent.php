<!DOCTYPE html>
<style>
* {
  box-sizing: border-box;
  background-color: #f2f2f2
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
    <title>Add Event</title>
</head>
<body>
<?php
  
?>
<div class="container">
<form action="submitEvent.php" method=post>    
<h2><b>Add an Event</b></h2>
<div class="row">
    <div class="col-25">
      <label for="fname">Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="name" name="name" placeholder="e.g. Public holiday" required>
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="fname">Date</label>
    </div>
    <div class="col-75">
      <input type="date" id="date" name="date" min='2000-01-01' max='2999-12-31' required>
    </div>
</div>
    <!-- Submit button that activates the next page -->
    <l><input type='submit' value='Confirm'/>
</form>
<?php
  $currentDate = date("Y-m-d");
  echo "<p><form action='CHIDEREK.php' method='post'>
  <input type='hidden' name='searchDate' value=$currentDate>
  <input type='submit' value='Cancel' style='background-color: grey'>
  </form>";

?>
</body>
</html>