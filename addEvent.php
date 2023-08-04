<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
</head>
<body>
<form action="submitEvent.php" method=post>
    <!-- The heading and two input boxes -->    
    <h2><b>Add an Event</b></h2>
    Date: <input type='date' name='date' min='2000-01-01' max='2999-12-31'/><br>
    Name: <input type='test' name='name'/><br><br>
    <!-- Submit button that activates the next page -->
    <l><input type='submit' value='Confirm' style="background-color: white;
      color: black; padding: 5px 20px; border-radius: 10px; text-align: center; display: inline-block; border: 2px solid green; "/></l>
</form>
</body>
</html>