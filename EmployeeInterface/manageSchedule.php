<?php
require 'employeeHeader.php';
require '../Controllers/checkAccess.php';

//Kick anyone not an employee out
if ($access != 'E') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: error.php");
}

if ($_SERVER['REQUEST_METHOD']=='POST') {
  if (isset($_POST['AddtoSchedule_button'])) {

    //Storing all posted inputs into php vars
      $event_SELECTED = mysqli_real_escape_string($mysqli, $_POST['event']);
      $category_SELECTED = mysqli_real_escape_string($mysqli, $_POST['category']);
      $date_SELECTED = mysqli_real_escape_string($mysqli, $_POST['date']);
      $time_SELECTED = mysqli_real_escape_string($mysqli, $_POST['time']);
      $location_SELECTED = mysqli_real_escape_string($mysqli, $_POST['location']);
      $type_SELECTED = mysqli_real_escape_string($mysqli, $_POST['type']);
      $price_SELECTED = mysqli_real_escape_string($mysqli, $_POST['price']);
      //CODE BELOW IS TO SEE VALUES INSERTED, REMOVE LATER
      echo "event: ".$event_SELECTED." <br /> category: ".$category_SELECTED." <br /> date: ".$date_SELECTED.
      "<br /> time: ".$time_SELECTED."<br /> location: ".$location_SELECTED.
      "<br /> type: ".$type_SELECTED."<br />price: ".$price_SELECTED;
      $mysqli->set_charset("utf8");
      $insertQuery1 = "INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)"
      ."VALUES ('$event_SELECTED', '$date_SELECTED', '$time_SELECTED', '$location_SELECTED',  '$type_SELECTED', '$category_SELECTED',  '$price_SELECTED')";

      mysqli_query($mysqli, $insertQuery1);
  }
}
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #009900;">
  <a class="navbar-brand navbar-dark"><font color="white">Summer Olympic Games</font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="employeeIndex.php">Dashboard<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="addAthletes.php">Add Athletes</a>
      <a class="nav-item nav-link active" href="manageSchedule.php">Manage Schedule</a>
      <a class="nav-item nav-link" href="modifyTickets.php">Modify Tickets</a>
      <a class="nav-item nav-link" href="logout.php"> Logout</a></li>
    </div>
  </div>
</nav>

<?php
  echo "ID: ".$_SESSION['first_name']." ".$_SESSION['last_name'];
  echo "<br />"
?>

<body>
<input type="submit" onclick="toggle_visibility('tog');" value="Add to Schedule"/>
<!--<div id="tog" style="display:none;" >-->
<div id="tog" >

<div class = "EUI_scheduleContainer">
  <form class = "schedule" action="manageSchedule.php" method="post" accept-charset="utf-8">
    <h4>Add to Schedule</h4>
      <div class = "grid4">
      <span><strong>Event Name</strong></span>
      <span><strong>Category</strong></span>
      <span><strong>Date</strong></span>
      <span><strong>Time</strong></span>
      <span><strong>Location</strong></span>
      <span><strong>Type</strong></span>
      <span><strong>Price</strong></span>

      <!--Drop Down bars below-->
      <select name="event">
        <?php
        $mysqli->set_charset("utf8");
        $query = "SELECT name FROM eventlist";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            //echo "<option value=".$row['name'].">".$row['name']."</option>"; //Can have bug with long strings with spaces
            $value = $row['name'];
            echo "<option value='$value'>$value</option>";
        }
        ?>
      </select>
      <select name="category">
        <?php
        $query = "SELECT category FROM categorylist";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            //echo "<option value=".$row['category'].">".$row['category']."</option>"; //OLD
            $value = $row['category'];
            echo "<option value='$value'>$value</option>";
        }
        ?>
      </select>
      <select name = "date">
        <option value="2016-08-03">03/08/2016</option>
        <option value="2016-08-03">04/08/2016</option>
        <option value="2016-08-03">05/08/2016</option>
        <option value="2016-08-03">06/08/2016</option>
        <option value="2016-08-03">07/08/2016</option>
        <option value="2016-08-03">08/08/2016</option>
        <option value="2016-08-03">09/08/2016</option>
        <option value="2016-08-03">10/08/2016</option>
        <option value="2016-08-03">11/08/2016</option>
        <option value="2016-08-03">12/08/2016</option>
        <option value="2016-08-03">13/08/2016</option>
        <option value="2016-08-03">14/08/2016</option>
        <option value="2016-08-03">15/08/2016</option>
        <option value="2016-08-03">16/08/2016</option>
        <option value="2016-08-03">17/08/2016</option>
        <option value="2016-08-03">18/08/2016</option>
      </select>
      <select name="time">
        <option  value="08:00:00">8:00AM</option>
        <option  value="09:00:00">9:00AM</option>
        <option  value="10:00:00">10:00AM</option>
        <option  value="10:30:00">10:30AM</option>
        <option  value="11:00:00">11:30AM</option>
        <option  value="11:30:00">11:30AM</option>
        <option  value="12:00:00">12:00PM</option>
        <option  value="13:00:00">1:00PM</option>
        <option  value="14:00:00">2:00PM</option>
        <option  value="15:00:00">3:00PM</option>
        <option  value="16:00:00">4:00PM</option>
        <option  value="17:00:00">5:00PM</option>
        <option  value="18:00:00">6:00PM</option>
        <option  value="19:00:00">7:00PM</option>
        <option  value="20:00:00">8:00PM</option>
      </select>
      <select name="location">
        <?php
        $query = "SELECT name FROM arenalist";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $value = $row['name'];
            echo "<option value='$value'>$value</option>";
        }
        ?>
      </select>
      <select name="type">
        <?php
        $query = "SELECT type FROM typelist";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $value = $row['type'];
            echo "<option value='$value'>$value</option>";
        }
        ?>
      </select>
      <input type="text" name="price" placeholder="Price" required/>
    </div>
    <input type="submit"  name="AddtoSchedule_button" />
  </form>
  <hr>
</div>


<div class="grid_container2">
  <span><h4>August 2016</h4></span>
  <form class = "Calendar action" action="manageSchedule.php" method="post">
  <div class="grid2">
    <span><strong>Sunday</strong></span>
    <span><strong>Monday</strong></span>
    <span><strong>Tuesday</strong></span>
    <span><strong>Wednesday</strong></span>
    <span><strong>Thursday</strong></span>
    <span><strong>Friday</strong></span>
    <span><strong>Saturday</strong></span>
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
</form>
  <div class="loadView_Container">
    <hr>
    <?php
    /*Note to self....refactor this ugo code when you have time*/
    /*idea: another way to implement this might be to load info into an array
      then pull from that array....maybe?*/
    if ($_SERVER['REQUEST_METHOD']=='POST') {
      echo "<div class=grid3>";
      echo "<span><strong>#</strong></span>";
      echo "<span><strong>Category</strong></span>";
      echo "<span><strong>Name</strong></span>";
      echo "<span><strong>Date</strong></span>";
      echo "<span><strong>Time</strong></span>";
      echo "<span><strong>Location</strong></span>";
      if (isset($_POST['3'])) {
        $query1 = "SELECT * FROM olympicevent WHERE date = '2016-08-03' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['4'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-04' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['5'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-05' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['6'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-06' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['7'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-07' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['8'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-08' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['9'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-09' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['10'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-10' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['11'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-11' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['12'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-12' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['13'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-13' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['14'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-14' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['15'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-15' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['16'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-16' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['17'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-17' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['18'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-18' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['19'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-19' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['20'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-20' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['21'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-21' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      echo "</div>";
    }
    ?>
  </div>
</div>




</div>
</body>

<script type="text/javascript">
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
</script>
