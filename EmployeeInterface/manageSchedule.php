<?php
  require 'employeeHeader.php';
  require '../Controllers/checkAccess.php';

  $mysqli->set_charset("utf8");

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
        /*echo "event: ".$event_SELECTED." <br /> category: ".$category_SELECTED." <br /> date: ".$date_SELECTED.
        "<br /> time: ".$time_SELECTED."<br /> location: ".$location_SELECTED.
        "<br /> type: ".$type_SELECTED."<br />price: ".$price_SELECTED;*/
        $insertQuery1 = "INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)"
        ."VALUES ('$event_SELECTED', '$date_SELECTED', '$time_SELECTED', '$location_SELECTED',  '$type_SELECTED', '$category_SELECTED',  '$price_SELECTED')";

        mysqli_query($mysqli, $insertQuery1);
    }else if(isset($_POST['DeletetoSchedule_button'])){

      //Store posted vars
      $event_SELECTED = mysqli_real_escape_string($mysqli, $_POST['event']);
      $date_SELECTED = mysqli_real_escape_string($mysqli, $_POST['date']);
      $time_SELECTED = mysqli_real_escape_string($mysqli, $_POST['time']);
      $deleteQuery1 = "DELETE FROM olympicEvent WHERE name = '$event_SELECTED' AND date = '$date_SELECTED' AND time = '$time_SELECTED'";
      mysqli_query($mysqli, $deleteQuery1);
    }else if (isset($_POST['ModifytoSchedule_button'])){

      //Storing all posted inputs into php vars
      $row_SELECTED = mysqli_real_escape_string($mysqli, $_POST['id']);
      $event_SELECTED = mysqli_real_escape_string($mysqli, $_POST['event']);
      $category_SELECTED = mysqli_real_escape_string($mysqli, $_POST['category']);
      $date_SELECTED = mysqli_real_escape_string($mysqli, $_POST['date']);
      $time_SELECTED = mysqli_real_escape_string($mysqli, $_POST['time']);
      $location_SELECTED = mysqli_real_escape_string($mysqli, $_POST['location']);
      $type_SELECTED = mysqli_real_escape_string($mysqli, $_POST['type']);
      $price_SELECTED = mysqli_real_escape_string($mysqli, $_POST['price']);
      $modifyQuery1 = "UPDATE olympicEvent
      SET name = '$event_SELECTED',
      date = '$date_SELECTED',
      time = '$time_SELECTED',
      location = '$location_SELECTED',
      type = '$type_SELECTED',
      category = '$category_SELECTED',
      ticketPrice = '$price_SELECTED'
      WHERE id = '$row_SELECTED'";
      mysqli_query($mysqli, $modifyQuery1);
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
      <a class="nav-item nav-link" href="index.php">Dashboard<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="manageAthletes.php">Manage Athletes</a>
      <a class="nav-item nav-link active" href="manageSchedule.php">Manage Schedule</a>
      <a class="nav-item nav-link" href="manageTickets.php">Manage Tickets</a>
      <a class="nav-item nav-link" href="manageData_Lists.php">Managa Data Lists</a>
      <a class="nav-item nav-link" href="logout.php"> Logout</a></li>
    </div>
  </div>
</nav>

<?php
  echo "ID: ".$_SESSION['first_name']." ".$_SESSION['last_name']."<br />Select Action:";
?>

<body>
  <!--FUNCTIONALITY BUTTONS-->
  <button type="button" onclick="toggle_visibility('tog');" class="btn btn-outline-success btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Add</button>
  <button type="button" onclick="toggle_visibility('tog2');" class="btn btn-outline-danger btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Delete</button>
  <button type="button" onclick="toggle_visibility('tog3');" class="btn btn-outline-primary btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Modify</button>

  <!--ADD SECTION-->
  <div id="tog" style="display:none;" >
    <div class = "EUI_scheduleContainer">
      <form class = "schedule" action="manageSchedule.php" method="post" accept-charset="utf-8">
        <h4>ADD</h4>
          <div class = "grid4">
            <span><strong>Event Name</strong></span>
            <span><strong>Category</strong></span>
            <span><strong>Date</strong></span>
            <span><strong>Time</strong></span>
            <span><strong>Location</strong></span>
            <span><strong>Type</strong></span>
            <span><strong>Price</strong></span>

            <!--Drop Down bars below-->
            <select class="form-control" name="event" required >
              <option value="" selected disabled hidden></option>
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
            <select class="form-control" name="category">
              <option value="" selected disabled hidden></option>
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
            <input class="form-control" type="date" value="2016-08-03" name="date">
            <input class="form-control" type="time" value="12:00:00" name="time">
            <select class="form-control" name="location">
              <option value="" selected disabled hidden></option>
              <?php
              $query = "SELECT name FROM arenalist";
              $result = mysqli_query($mysqli, $query);
              while ($row = mysqli_fetch_assoc($result)) {
                  $value = $row['name'];
                  echo "<option value='$value'>$value</option>";
              }
              ?>
            </select>
            <select class="form-control" name="type">
              <option value="" selected disabled hidden></option>
              <?php
              $query = "SELECT type FROM typelist";
              $result = mysqli_query($mysqli, $query);
              while ($row = mysqli_fetch_assoc($result)) {
                  $value = $row['type'];
                  echo "<option value='$value'>$value</option>";
              }
              ?>
            </select>
            <input type="text" class="form-control" name="price" placeholder="Price" required/>
          </div>
        <button type="submit" name="AddtoSchedule_button" class="btn btn-success btn-block btn-sm">Submit</button>
      </form>
      <hr>
    </div>
  </div>

  <!--DELETE SECTION-->
  <div id="tog2" style="display:none;" >
    <div class = "EUI_scheduleContainer">
      <form class = "schedule" action="manageSchedule.php" method="post" accept-charset="utf-8">
        <h4>DELETE</h4>
          <div class = "grid6">
            <span><strong>Event Name</strong></span>
            <span><strong>Date</strong></span>
            <span><strong>Time</strong></span>

            <!--Drop Down bars below-->
            <select class="form-control" name="event" required >
              <option value="" selected disabled hidden></option>
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
            <input class="form-control" type="date" value="2016-08-03" name="date">
            <input class="form-control" type="time" value="12:00:00" name="time">
          </div>
        <button type="submit" name="DeletetoSchedule_button" class="btn btn-danger btn-block btn-sm">Submit</button>
      </form>
      <hr>
    </div>
  </div>

  <!--MODIFY SECTION-->
  <div id="tog3" style="display:none;" >
    <div class = "EUI_scheduleContainer">
      <form class = "schedule" action="manageSchedule.php" method="post" accept-charset="utf-8">
        <h4>MODIFY</h4>
          <div class = "grid7">
            <span><strong>Row Key</strong></span>
            <span><strong>Event Name</strong></span>
            <span><strong>Category</strong></span>
            <span><strong>Date</strong></span>
            <span><strong>Time</strong></span>
            <span><strong>Location</strong></span>
            <span><strong>Type</strong></span>
            <span><strong>Price</strong></span>

            <!--Drop Down bars below-->
            <input class="form-control" type="text" name="id" placeholder="#" required>
            <select class="form-control" name="event" required >
              <option value="" selected disabled hidden></option>
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
            <select class="form-control" name="category">
              <option value="" selected disabled hidden></option>
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
            <input class="form-control" type="date" value="2016-08-03" name="date">
            <input class="form-control" type="time" value="12:00:00" name="time">
            <select class="form-control" name="location">
              <option value="" selected disabled hidden></option>
              <?php
              $query = "SELECT name FROM arenalist";
              $result = mysqli_query($mysqli, $query);
              while ($row = mysqli_fetch_assoc($result)) {
                  $value = $row['name'];
                  echo "<option value='$value'>$value</option>";
              }
              ?>
            </select>
            <select class="form-control" name="type">
              <option value="" selected disabled hidden></option>
              <?php
              $query = "SELECT type FROM typelist";
              $result = mysqli_query($mysqli, $query);
              while ($row = mysqli_fetch_assoc($result)) {
                  $value = $row['type'];
                  echo "<option value='$value'>$value</option>";
              }
              ?>
            </select>
            <input type="text" class="form-control" name="price" placeholder="Price" required/>
          </div>
        <button type="submit" name="ModifytoSchedule_button" class="btn btn-primary btn-block btn-sm">Submit</button>
      </form>
      <hr>
    </div>
  </div>

  <!--CALENDAR SECTION-->
  <div class="grid_container5">
    <span><h4>August 2016</h4></span>
    <form action="">
      <div class="grid5">
        <span><strong>Sunday</strong></span>
        <span><strong>Monday</strong></span>
        <span><strong>Tuesday</strong></span>
        <span><strong>Wednesday</strong></span>
        <span><strong>Thursday</strong></span>
        <span><strong>Friday</strong></span>
        <span><strong>Saturday</strong></span>
        <span></span>
        <span><button type="button" class="btn btn-link" disabled>1</button></span>
        <span><button type="button" class="btn btn-link" disabled>2</button></span>
        <?php
          $eventCounter = 3;
          $dayCounter = 22;
          $date = "2016-08-";
          while ($eventCounter < 22){
            $completeDate = $date."".$eventCounter;
            echo "<span><button  type='button' onclick='loadEvents(\"$completeDate\")' class='btn btn-link' value=".$eventCounter.">$eventCounter</button></span>";
            $eventCounter++;
          }
          while ($dayCounter < 32){
            /*echo "<span>".$dayCounter."</span>";*/
            echo "<span><button type='button' class='btn btn-link' disabled>".$dayCounter."</button></span>";
            $dayCounter++;
          }
        ?>
        <span></span>
        <span></span>
        <span></span>
      </div> <!--grid5-->
    </form>

    <div id="loadhere"></div>
  </div>
</body>

<script>
  function toggle_visibility(id) {
     var e = document.getElementById(id);
     if(e.style.display == 'block')
        e.style.display = 'none';
     else
        e.style.display = 'block';
  }

  function loadEvents(number) {

    //document.getElementById("demo").innerHTML = number; //This loads the correct value, value is being received.

    //create Var
    var xhttp;

    //Create an XMLHttpRequest object
    xhttp = new XMLHttpRequest();

    //Create the function to be executed when the server response is ready
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("loadhere").innerHTML = this.responseText;
      }
    };
    //Send the request off to a file on the server, Notice that a parameter (q) is added to the URL (with the content of the dropdown list)
    xhttp.open("POST", "../Controllers/getEvents_E.php?q="+number, true);
    xhttp.send();
  }
</script>
