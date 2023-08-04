<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Profile</title>
</head>
<body>
<form action="submitProfile.php" method=post>
    <!-- The heading and two input boxes -->    
    <h2><b>Set up a Profile</b></h2>
    First Name: <input type='test' name='firstName'/><br>
    Last Name: <input type='test' name='lastName'/><br>
    Occupation: <input type='test' name='job'/><br>
    Status:
        <select name = 'status'> 
            <option value = 'Avaliable' " . ">Avaliable</option>
            <option value = 'On Leave' " . ">On Leave</option>
            <option value = 'Sick' " . ">Sick</option>
            <option value = 'Unavaliable' " . ">Unavaliable</option>
        </select>

    <!-- Submit button that activates the next page -->
    <l><input type='submit' value='Confirm' style="background-color: white;
      color: black; padding: 5px 20px; border-radius: 10px; text-align: center; display: inline-block; border: 2px solid green; "/></l>
</form>
</body>
</html>