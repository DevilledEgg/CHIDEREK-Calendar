<!DOCTYPE html>
<style>
    h1 {
        display: block;
        font-size: 2em;
        margin-left: 0;
        margin-right: 0;
        font-weight: bold;
    }
    t {
        display: block;
        font-size: 1.3em;
    }
    div {
        background-color:#ffffff;
        padding-top: 5px;
        padding-bottom: 10px;
        padding-left: 25px;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        margin: 10px auto;
        width: 60%;
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
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
</head>
<div>
<body>
<?php
    // Prings employee information from last page //
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

    for ($i = 0; $i <count($profiles); $i++) {
        if ($profiles[$i][5] == $_POST['id']) {

            echo '<h1>',$profiles[$i][0] . ' ' . $profiles[$i][1], '</h1>';
            echo '<t><h4>', '[' . $profiles[$i][2] . ']</h4>';
            echo '<p>Regular Hours: ' . '<i>' . $profiles[$i][6] . ' - ' . $profiles[$i][7] . '</i>';
            echo '<p>Status: '. '<i>' . $profiles[$i][3] . '</i>';
            echo '<p>Notes: '. '<i>' . $profiles[$i][8] . '</i>';
            echo '<p>Tag: '. '<i>' . $profiles[$i][4] . '</i>';
            echo '<form action="editProfile.php" method=post>
                    <input type="hidden" name="id" value= ' . $profiles[$i][5] . '>
                    <input type="submit" value="Edit">
                 </form><p>';
            echo '<form action="deleteProfile.php" method=post>
                 <input type="hidden" name="id" value= ' . $profiles[$i][5] . '>
                 <input type="submit" value="Delete">
              </form><p>';
            echo '<form action="profiles.php" method=post>
                    <input type="submit" value="Back">
                 </form>';
        }
    }
 

?>
    
</body>
</div>
</html>