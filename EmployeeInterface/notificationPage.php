<?php
require 'employeeHeader.php';
require '../Controllers/checkAccess.php';
//Logic to choose different header would go here, by default require header is there.
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
      <a class="nav-item nav-link" href="manageData_Lists.php">Manage Data Lists</a>
      <a class="nav-item nav-link" href="athlete_event_registration.php">Athlete Event Registration</a>
      <a class="nav-item nav-link" href="../logout.php"> Logout</a>
    </div>
  </div>
    <a class="navbar-brand float-right" href="notificationPage.php">
      <img class="img-responsive" width="70px" height="40px" src="../assets/rio-2016-logo.png">
    </a>
  <span class="navbar-text">
      <a class="nav-item nav-link" style="color: #ffffff"> <?php echo "UserID: ".$_SESSION['first_name']." ".$_SESSION['last_name']; ?> </a>
  </span>
</nav>
</body>
<body>
  <div class="notificationPage_container">
    <hr>
    <?php
    $query1 = "SELECT updatedEvent.name AS oldName, updatedEvent.date AS oldDate, updatedEvent.time AS oldTime, updatedEvent.location AS oldLocation, updatedEvent.type AS oldType, olympicEvent.name, olympicEvent.date, olympicEvent.time, olympicEvent.location, olympicEvent.type, olympicEvent.category, olympicEvent.ticketPrice FROM olympicEvent INNER JOIN updatedEvent ON olympicEvent.id=updatedEvent.olympicEventID";
    $query1_result = mysqli_query($mysqli, $query1);
    while($row = mysqli_fetch_array($query1_result)) {
        if($row['oldDate'] != $row['date'] and $row['oldTime'] != $row['time'] and $row['oldLocation'] != $row['location']) {
            echo "The event previously taking place at " . $row['oldLocation'] . " at " . $row['oldDate'] . " " . $row['oldTime'] . " is now at " . $row['location'] . " at " . $row['time'] . " " . $row['date'] . ".";
        }
        elseif($row['oldDate'] != $row['date'] and $row['oldTime'] != $row['time']){
            echo "The event previously taking place at " . $row['oldDate'] . " " . $row['oldTime'] . " is now at " . " at " . $row['date'] . " " . $row['time'] . ".";
        }
        elseif($row['oldTime'] != $row['time'] and $row['oldLocation'] != $row['location']){
            echo "The event previously taking place at " . $row['oldLocation'] . " at " . $row['oldTime'] . " is now at " . $row['location'] . " at " . $row['time'] . ".";
        }
        elseif($row['oldDate'] != $row['date'] and $row['oldLocation'] != $row['location']){
            echo "The event previously taking place at " . $row['oldLocation'] . " " . $row['oldTime'] . " is now at "  . $row['location'] . " " . $row['time'] . ".";
        }
        elseif($row['oldDate'] != $row['date']){
            echo "The event previously taking place at " . $row['oldDate'] . " is now at " . $row['date'] . ".";
        }
        elseif($row['oldTime'] != $row['time']){
            echo "The event previously taking place at " . $row['oldTime'] . " is now at " . $row['time'] . ".";
        }
        elseif($row['oldLocation'] != $row['location']){
            echo "The event previously taking place at " . $row['oldLocation'] . " is now at " . $row['location'] . ".";
        }
    }
    echo"</tr>";
    echo "</table>"
    ?>
</div>
</body>
</html>