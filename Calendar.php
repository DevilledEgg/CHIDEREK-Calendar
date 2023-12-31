<!DOCTYPE html>
<!-- Source code: https://codeshack.io/event-calendar-php/ -->
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li.dropdown {
  display: inline-block;
}

.active {
  background-color: #04AA6D;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}

</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHIDEREK Calendar</title>
</head>
<body>
<?php
class Calendar {
    

    // Private properties and methods can only be used by the class where they are defined. //
    // Outside code and derived classes cannot use them. //
    private $active_year, $active_month, $active_day;
    private $events = [];
    
    
    // This function finds the current year, month and day from the devices own calendar and stores it into these variables. //
    public function __construct($date = null) {
        // $this is a reserved keyword. It usually refers to the object to which the method belongs. //
        // Represents a value that changes depending on the context of program execution. //
        $this->active_year = $date != null ? date('Y', strtotime($date)) : date('Y');
        $this->active_month = $date != null ? date('m', strtotime($date)) : date('m');
        $this->active_day = $date != null ? date('d', strtotime($date)) : date('d');
    }

    // The 'add_event' function is determined, giving it an input of text, the date, number of days and the colour. //
    public function add_event($txt, $date, $days =  1, $colour = '') {
        $colour = $colour ? ' ' . $colour : $colour;
        $this->events[] = [$txt, $date, $days, $colour];
    }

    // I'm not entirely sure what is happening here but I'll do my best to explain. //
    public function __toString() {
        // The number of days in a month is found by taking the numbers from the year, month and day and creating a normal calendar format. //
        $num_days = date('t', strtotime($this->active_day . '-' . $this->active_month . '-' . $this->active_year));
        // The same happens again, but with the last month instead. //
        $num_days_last_month = date('j', strtotime('last day of previous month', strtotime($this->active_day . '-' . $this->active_month . '-' . $this->active_year)));
        // Days are allocated into an array. //
        $days = [0 => 'Sun', 1 => 'Mon', 2 => 'Tue', 3 => 'Wed', 4 => 'Thu', 5 => 'Fri', 6 => 'Sat'];
        // First day of the week is found by finding the weekday under the first day of the month on the device's in-built calendar. //
        $first_day_of_week = array_search(date('D', strtotime($this->active_year . '-' . $this->active_month . '-1')), $days);
        // html is presenting the visuals for the users. //
        $html = '<div class="calendar">';
        $html .= '<div class="header">';
        $html .= '<div class="month-year">';
        $html .= date('F Y', strtotime($this->active_year . '-' . $this->active_month . '-' . $this->active_day));
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="days">';
        foreach ($days as $day) {
            $html .= '
                <div class="day_name">
                    ' . $day . '
                </div>
            ';
        }
        
        for ($i = $first_day_of_week; $i > 0; $i--) {
            $html .= '
                <div class="day_num ignore">
                    ' . ($num_days_last_month-$i+1) . '
                </div>
            ';
        }
        for ($i = 1; $i <= $num_days; $i++) {
            $selected = '';
            if ($i == $this->active_day) {
                $selected = ' selected';
            }
            $html .= '<div class="day_num' . $selected . '">';
            $html .= '<span>' . $i . '</span>';
            foreach ($this->events as $event) {
                for ($d = 0; $d <= ($event[2]-1); $d++) {
                    if (date('y-m-d', strtotime($this->active_year . '-' . $this->active_month . '-' . $i . ' -' . $d . ' day')) == date('y-m-d', strtotime($event[1]))) {
                        $html .= '<div class="event' . $event[3] . '">';
                        $html .= $event[0];
                        $html .= '</div>';
                    }
                }
            }
            $html .= '</div>';
        }
        echo "<ul>
        <li><a class='active' >Calendar</a></li>
        <li class='dropdown'>
            <a class='dropbtn' target='_self'>Employees</a>
            <div class='dropdown-content'>
                <a href='profiles.php' target='_self'>Profile List</a>
                <a href='addProfile.php' target='_self'>Add Employee</a>
            </div>
        </li>
        <li><a href='addEvent.php' target='_self'>Add Event</a></li>
        <li><a href='addWorkDay.php' target='_self'>Add Work Day</a></li>
        </ul>";

        $view = $_POST['searchDate'];

        // This is my own code. This part is a search button. //
        // Inputting a certain date will tell the calendar to show that particular date and its resepctive information. //
        echo "<p><td>
        <form action='CHIDEREK.php' method='post'>
            <input type='date' name='searchDate' value=$view min='2000-01-01' max='2999-12-31' required>
            <input type='submit' value='Search'>
        </form>
        </td>";
        echo "<p><td>
        <form action='presentDay.php' method='post'>
            <input type='date' name='presentDate' min='2000-01-01' max='2999-12-31' required>
            <input type='submit' value='Expand'>
        </form>
        </td>";
        
        for ($i = 1; $i <= (42-$num_days-max($first_day_of_week, 0)); $i++) {
            $html .= '
                <div class="day_num ignore">
                    ' . $i . '
                </div>
            ';
        }
        $html .= '</div>';
        $html .= '</div>';
        return $html;
        
    }

}
?>  
</body>
</html>