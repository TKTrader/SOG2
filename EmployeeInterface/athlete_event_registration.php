<?php
  require 'employeeHeader.php';
  require '../Controllers/checkAccess.php';
  $mysqli->set_charset("utf8");

  //Kick anyone not an employee out
  if ($access != 'E') {
      $_SESSION['message'] = 'Invalid Access';
      header("location: ../Controllers/error.php");
  }

  if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['Add_Athlete_Event'])) {

      //Store posted values in vars
      $athleteid = mysqli_real_escape_string($mysqli, $_POST['athleteID']);
      $eventid = mysqli_real_escape_string($mysqli, $_POST['eventID']);
      $placement = mysqli_real_escape_string($mysqli, $_POST['placement']);

      //query to insert
      $sql = "INSERT INTO athleteEvent (athleteID, eventID, placement) VALUES ('$athleteid', '$eventid', '$placement')";
      mysqli_query($mysqli, $sql);
    }
    else if (isset($_POST['Delete_Athlete_Event'])) {

      //Store posted values in vars
      $rowid = mysqli_real_escape_string($mysqli, $_POST['athleteevent_id']);

      //query to delete
      $deleteEvent = "DELETE FROM athleteEvent WHERE id = '$rowid'";
      mysqli_query($mysqli, $deleteEvent);
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
      <a class="nav-item nav-link" href="manageSchedule.php">Manage Schedule</a>
      <a class="nav-item nav-link" href="manageTickets.php">Manage Tickets</a>
      <a class="nav-item nav-link" href="manageData_Lists.php">Managa Data Lists</a>
      <a class="nav-item nav-link active" href="athlete_event_registration.php">Athlete Event Registration</a>
      <a class="nav-item nav-link" href="logout.php"> Logout</a></li>
    </div>
  </div>
  <img class="img-responsive" width="70px" height="40px" src="../assets/rio-2016-logo.png">
  <span class="navbar-text">
      <a class="nav-item nav-link" style="color: #ffffff"> <?php echo "UserID: ".$_SESSION['first_name']." ".$_SESSION['last_name']; ?> </a>
  </span>
</nav>

<body>
  <!--FUNCTIONALITY BUTTONS-->
  </br>
  <p>Select an action:
    <button type="button" onclick="toggle_visibility('tog1');" class="btn btn-outline-info btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Add/Delete</button>
    <button type="button" onclick="toggle_visibility('tog2');" class="btn btn-outline-primary btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Modify</button>
    </p>

  <!--ADD SECTION-->
  <div id="tog1" style="display:none;" >
    <div class = "EUI_athleteEventContainer">
      <form class = "schedule" action="athlete_event_registration.php" method="post" accept-charset="utf-8">
        <h4>ADD</h4>
          <div class = "grid11">
            <span><strong>Athlete Id</strong></span>
            <span><strong>Event Id</strong></span>
            <span><strong>Placement</strong></span>
            <span></span>
            <!--Drop Down bars below-->
            <input class="form-control" type="text"  name="athleteID" placeholder="#" required>
            <input class="form-control" type="text"  name="eventID" placeholder="#" required>
            <input class="form-control" type="text"  name="placement" placeholder="#">
            <button type="submit" name="Add_Athlete_Event" class="btn btn-success btn-block btn-sm">Submit</button>
          </div>
      </form>
      <form class = "schedule" action="athlete_event_registration.php" method="post" accept-charset="utf-8">
        <h4>DELETE</h4>
          <div class = "grid12">
            <span><strong>Row Key</strong></span>
            <span></span>
            <!--Drop Down bars below-->
            <input class="form-control" type="text"  name="athleteevent_id" placeholder="#" required>
            <button type="submit" name="Delete_Athlete_Event" class="btn btn-danger btn-block btn-sm">Submit</button>
          </div>
      </form>

      <div class="SbyS">
        <div class="grid13">
          <span><strong>Athlete id </strong></span>
          <span><strong>Athlete Name</strong></span>
          <?php
            //Select everything from event table
            $sql ="SELECT * FROM users WHERE access = 'A'";
            $sql2 ="SELECT * FROM olympicevent";

            //Counter var
            $counter = 1;
            $counter2 = 1;

            //run sql code and store in $result
            $result = mysqli_query($mysqli, $sql);
            $result2 = mysqli_query($mysqli, $sql2);

            //Store the #  of rows in set
            $queryResult = mysqli_num_rows($result);
            $queryResult2 = mysqli_num_rows($result2);

            //must at least have 1 row in result
            if ($queryResult>0){
              //fetch association array and store in $row
              while ($row = mysqli_fetch_assoc($result)){
                if ($counter % 2 != 0){
                  echo "<span style='background-color:#EEEEEE;'>".$row['id']."</span>";
                  echo "<span style='background-color:#EEEEEE;'>".$row['firstName']." ". $row['lastName']."</span>";
                  $counter++;
                }else{
                  echo "<span>".$row['id']."</span>";
                  echo "<span>".$row['firstName']." ". $row['lastName']."</span>";
                  $counter++;
                }
              }
            }
          ?>
        </div>
        <div class = "grid13">
          <span><strong>Event id</strong></span>
          <span><strong>Event Name</strong></span>
          <?php
            //must at least have 1 row in result
            if ($queryResult2>0){
              //fetch association array and store in $row
              while ($row2 = mysqli_fetch_assoc($result2)){
                if($counter2 % 2 !=0){
                  echo "<span style='background-color:#EEEEEE;'>".$row2['id']."</span>";
                  echo "<span style='background-color:#EEEEEE;'>".$row2['name']."</span>";
                  $counter2++;
                }else{
                  echo "<span>".$row2['id']."</span>";
                  echo "<span>".$row2['name']."</span>";
                  $counter2++;
                }
              }
            }
          ?>
        </div>
        <div class="grid14">
          <span><strong># </strong></span>
          <span><strong>Althlete Id</strong></span>
          <span><strong>Event Id</strong></span>
          <span><strong>Placement</strong></span>
          <?php
            //Select everything from event table
            $sql ="SELECT * FROM athleteevent";
            $result = mysqli_query($mysqli, $sql);
            $queryResult = mysqli_num_rows($result);

            //must at least have 1 row in result
            if ($queryResult>0){
              //fetch association array and store in $row
              while ($row = mysqli_fetch_assoc($result)){
                if ($counter % 2 != 0){
                  echo "<span style='background-color:#EEEEEE;'>".$row['id']."</span>";
                  echo "<span style='background-color:#EEEEEE;'>".$row['athleteID']."</span>";
                  echo "<span style='background-color:#EEEEEE;'>".$row['eventID']."</span>";
                  echo "<span style='background-color:#EEEEEE;'>".$row['placement']."</span>";
                  $counter++;
                }else{
                  echo "<span>".$row['id']."</span>";
                  echo "<span>".$row['athleteID']."</span>";
                  echo "<span>".$row['eventID']."</span>";
                  echo "<span>".$row['placement']."</span>";
                  $counter++;
                }
              }
            }
          ?>
        </div>
      </div>
      <hr>
    </div>
  </div>

  <!--MODIFY SECTION-->
  <div id="tog2" style="display:none;" >
    <div class = "EUI_scheduleContainer">
      <form class = "schedule" action="athlete_event_registration.php" method="post" accept-charset="utf-8">
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
            <input class="form-control" type="text" name="id"placeholder="#" required>
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
            <select class="form-control" name="category" required>
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
            <input class="form-control" type="date" value="2016-08-03" name="date" required>
            <input class="form-control" type="time" value="12:00:00" name="time" required>
            <select class="form-control" name="location" required>
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
            <select class="form-control" name="type" required>
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
</body>

<script>
  function toggle_visibility(id) {
     var e = document.getElementById(id);
     if(e.style.display == 'block')
        e.style.display = 'none';
     else
        e.style.display = 'block';
  }
</script>
