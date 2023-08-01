<!DOCTYPE html>
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
        // This is my own code. This part is a search button. //
        // Inputting a certain date will tell the calendar to show that particular date and its resepctive information. //
        echo "<p><td>
        <form action='CHIDEREK.php' method='post'>
            <input type='test' name='searchDate'/>
            <input type='submit' value='Search'>
        </form>
        </td>";
        // This part is a add event button. //
        // Any information that is filled by the user will go into the CSV and be printed onto the calendar. //
        echo "<td>
        <form action='addEvent.php' method='post'>
            <input type='submit' value='Add Event'>
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