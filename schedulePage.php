<?php
require 'header.php';
?>
Here we need to create a sort of "calendar" like view but smaller, Olympics only last like 18 Days. Similar to http://www.espn.com/olympics/summer/2016/schedule/_/date/20160817
<br />
When you click on a date with scheduled events it will load below.
Maybe need to shrink calendar
add css to make dates with events stand out.
<div class="grid_container">
  <div class="grid2">
    <span>Sunday</span>
    <span>Monday</span>
    <span>Tuesday</span>
    <span>Wednesday</span>
    <span>Thursday</span>
    <span>Friday</span>
    <span>Saturday</span>
    <span></span>
    <span>1</span>
    <span>2</span>
    <?php
      $eventCounter = 3;
      $dayCounter = 22;

      while ($eventCounter < 22){
        echo "<span><input type=submit value=".$eventCounter." name=".$eventCounter." /></span>";
        $eventCounter++;
      }
      while ($dayCounter < 32){
        echo "<span>".$dayCounter."</span>";
        $dayCounter++;
      }
    ?>
    <span></span>
    <span></span>
    <span></span>
  </div>
</div>
