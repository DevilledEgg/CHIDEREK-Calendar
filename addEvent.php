<!DOCTYPE html>
<style>
a:link, a:visited {
  text-decoration: blue;
}

a:hover {
  text-decoration: underline;
}

a:active {
  text-decoration: underline;
}
    * {
    text-align: center;
    }

    div {
        background-color:#ffffff;
        padding-top: 5px;
        padding-bottom: 10px;
        padding-left: 25px;
        padding-right: 5px;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        margin: 10px auto;
        width: 30%;

    }

</style>
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