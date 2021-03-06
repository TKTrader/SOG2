<?php
//Logic to choose different header would go here, by default require header is there.
require 'header.php';
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <a class="navbar-brand" href="index.php">Summer Olympic Games</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="athletePage.php">Athletes</a>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Event Details
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="eventsPage.php">Events</a>
          <a class="dropdown-item" href="schedulePage.php">Schedule</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="registerPage.php">Register</a>
            <a class="dropdown-item" href="loginPage.php">Login</a>
        </div>
      </li>
    </div>
</div>

<div class="bell">
    <a class="navbar-brand float-right" href="notificationPage.php">
          <img src="assets/bell.png" height="30" alt="">
        </a>
</div>
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
            echo "<p>The event previously taking place at " . $row['oldLocation'] . " at " . $row['oldDate'] . " " . $row['oldTime'] . " is now at " . $row['location'] . " at " . $row['time'] . " " . $row['date'] . ".</p>";
        }
        elseif($row['oldDate'] != $row['date'] and $row['oldTime'] != $row['time']){
            echo "<p>The event previously taking place at " . $row['oldDate'] . " " . $row['oldTime'] . " is now at " . " at " . $row['date'] . " " . $row['time'] . ".<p/>";
        }
        elseif($row['oldTime'] != $row['time'] and $row['oldLocation'] != $row['location']){
            echo "<p>The event previously taking place at " . $row['oldLocation'] . " at " . $row['oldTime'] . " is now at " . $row['location'] . " at " . $row['time'] . ".</p>";
        }
        elseif($row['oldDate'] != $row['date'] and $row['oldLocation'] != $row['location']){
            echo "<p>The event previously taking place at " . $row['oldLocation'] . " " . $row['oldTime'] . " is now at "  . $row['location'] . " " . $row['time'] . ".</p>";
        }
        elseif($row['oldDate'] != $row['date']){
            echo "<p>The event previously taking place at " . $row['oldDate'] . " is now at " . $row['date'] . ".</p.";
        }
        elseif($row['oldTime'] != $row['time']){
            echo "<p>The event previously taking place at " . $row['oldTime'] . " is now at " . $row['time'] . ".</p>";
        }
        elseif($row['oldLocation'] != $row['location']){
            echo "<p>The event previously taking place at " . $row['oldLocation'] . " is now at " . $row['location'] . ".</p>";
        }
    }
    echo"</tr>";
    echo "</table>"
    ?>
</div>
</body>
</html>