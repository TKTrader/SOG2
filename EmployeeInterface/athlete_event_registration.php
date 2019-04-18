<?php
  require 'employeeHeader.php';
  require '../Controllers/checkAccess.php';
  $mysqli->set_charset("utf8");

  //Kick anyone not an employee out
  if ($access != 'E') {
      $_SESSION['message'] = 'Invalid Access';
      header("location: ../Controllers/error.php");
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
</nav>

<!--Display ID-->
<?php
  echo "ID: ".$_SESSION['first_name']." ".$_SESSION['last_name']."<br />Select Action:";
 ?>

<body>
  <!--FUNCTIONALITY BUTTONS-->
  <button type="button" onclick="toggle_visibility('tog1');" class="btn btn-outline-success btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Add</button>
  <button type="button" onclick="toggle_visibility('tog2');" class="btn btn-outline-danger btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Delete</button>
  <button type="button" onclick="toggle_visibility('tog3');" class="btn btn-outline-primary btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Modify</button>

  <!--ADD SECTION-->
  <div id="tog1" style="display:none;" >
    <div class = "EUI_scheduleContainer">
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
            <input class="form-control" type="text"  name="Placement" placeholder="#" required>
            <button type="submit" name="Add_Athlete_Event " class="btn btn-success btn-block btn-sm">Submit</button>
          </div>
      </form>
      <hr>
    </div>
  </div>

  <!--DELETE SECTION-->
  <div id="tog2" style="display:none;" >
    <div class = "EUI_scheduleContainer2">
      <form class = "schedule" action="manageSchedule.php" method="post" accept-charset="utf-8">
        <h4>DELETE</h4>
          <div class = "grid12">
            <span><strong>Row Key</strong></span>
            <!--Drop Down bars below-->
            <input class="form-control" type="text"  name="athleteevent_id" placeholder="#" required>
            <button type="submit" name="DeletetoSchedule_button" class="btn btn-danger btn-block btn-sm">Submit</button>
          </div>
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
