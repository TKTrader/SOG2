<?php
require 'employeeHeader.php';
require '../Controllers/checkAccess.php';

//Kick anyone not an employee out
if ($access != 'E'){
  $_SESSION['message'] = 'Invalid Access';
  header("location: error.php");
}
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #009900;">
  <a class="navbar-brand navbar-dark">Summer Olympic Games</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="employeeIndex.php">Dashboard<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="addAthletes.php">Add Athletes</a>
      <a class="nav-item nav-link active" href="modifySchedule.php">Modify Schedule</a>
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
<div id="tog" style="display:none;" >
<!--heres the logic for the schedule--->

<div class = "scheduleContainer">
<form class = "schedule" action="manageSchedule.php" method="post">
  <h4>Add to Schedule</h4>
    <div class = "grid5">
    <span><strong>Event Name</strong></span>
    <span><strong>Date</strong></span>
    <span><strong>Time</strong></span>
    <span><strong>Location</strong></span>
    <span><strong>Type</strong></span>
    <span><strong>Category</strong></span>

    <select name="schedule">
      <?php
      $query = "SELECT name FROM eventlist";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value=".$row['name'].">".$row['name']."</option>";
      }
      ?>
    </select>
    <input type="text" name="date" placeholder="yyyy-mm-dd" required/>
    <!--<input type="text" name="time" placeholder="hh:mm:ss" required/>-->
    <select name="time">
      <option  value="10:00:00">10:00AM</option>
      <option  value="10:30:00">10:30AM</option>
      <option  value="11:00:00">11:30AM</option>
      <option  value="11:30:00">11:30AM</option>
      <option  value="12:00:00">12:00PM</option>
      <option  value="12:00:00">12:00PM</option>
      <option  value="12:00:00">12:00PM</option>
      <option  value="12:00:00">12:00PM</option>
      <option  value="12:00:00">12:00PM</option>
    </select>
    <input type="text" name="location" placeholder="Location" required/>
    <select name="type">
      <?php
      $query = "SELECT type FROM typelist";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value=".$row['type'].">".$row['type']."</option>";
      }
      ?>
    </select>
    <select name="category">
      <?php
      $query = "SELECT category FROM categorylist";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value=".$row['category'].">".$row['category']."</option>";
      }
      ?>
    </select>

  </div>
  <input type="submit"  name="event" />
</form>
</div>


</div>
</body>

<script type="text/javascript">
<!--
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
//-->
</script>
