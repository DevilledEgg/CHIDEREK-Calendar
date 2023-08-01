<html>
    <head>
        <title>Event List</title>
    </head>
    <body>
        <h1>Created Events</h1>
        <!-- Another table -->
        <table>
            
            <!-- Table Heading -->
            <tr> 
                <th>Event ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>


<?php
// Identifying the function with a variable.
$events = readEventsFromCSV();

// The function to read the orders from the CSV file (we use them somewhere eventually.)
function readEventsFromCSV() {
    // The variable $file now will open the CSV file and read it.
    $file = fopen('calendar.csv', 'r'); // 'r' is just reading the file
    // The variable $orders is now an array with nothing currently in it.
    $events = array();
    // $data now holds the information in $file a.k.a CSV file
    // So when $data is equal to data in $file, $orders (the array) now equals $data
    // Essentially $orders has the CSV data now
    while (($data = fgetcsv($file)) !== false) {
        $events[] = $data;
    } 
fclose($file);
return $events;
}

// For each line of orders, display it in the table and loop for all lines.
// I think $order is now a variable that can be used for one specific cell.
foreach ($events as $event) {   
    // Each data cell from the name to the total cost is put into the table in an allocated order. 
    echo "<tr>";
    echo "<td>" . $event[2] . "</td>";
    echo "<td>" . $event[0] . "</td>";
    echo "<td>" . $event[1] . "</td>";

    // This part adds a delete button instead of a link that activates 'delete_order.php'.
    echo "<td>
    <form action='CHIDEREK.php' method='post'>
        <input type='hidden' name='id' value='" . $event[2] . "'>
        <input type='submit' value = 'Submit'>
    </form>
    </td>";
    
    // This part adds an edit button instead of a link that activates 'editOrders.php'.
    echo "<td>
    <form action='editOrders.php' method='post'>
        <input type='hidden' name='id' value='" . $event[2] . "'>
        <input type='submit' value = 'Edit'>
    </form>
    </td>";

    echo "</tr>";
}
?>
</table>
</body>
<p><a href="CHIDEREK.php" target="_self">Back to main page</a></p>
</html>