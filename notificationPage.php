<?php
//Logic to choose different header would go here, by default require header is there.
require 'header.php';
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Summer Olympic Games</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="eventsPage.php">Events</a>
      <a class="nav-item nav-link" href="schedulePage.php">Schedule</a>
      <a class="nav-item nav-link" href="athletePage.php">Athletes</a>
      <a class="nav-item nav-link" href="registerPage.php">Register</a>
      <a class="nav-item nav-link" href="loginPage.php">Login</a>
    </div>
  </div>
  <img class="img-responsive" width="70px" height="40px" src="assets/rio-2016-logo.png">
  <span class="navbar-text">
      <a class="nav-item nav-link" style="color: #ffffff"> <?php echo "UserID: ".$_SESSION['first_name']." ".$_SESSION['last_name']; ?> </a>
  </span>
</nav>
</body>
<body>
  <div class="notificationPage_container">
    <hr>
    <?php
    $query1 = "SELECT updatedEvent.location AS oldLocation, updatedEvent.date AS oldDate, updatedEvent.time AS oldTime, updatedEvent.name AS oldName, updatedEvent.category AS oldCategory, olympicEvent.location, olympicEvent.date, olympicEvent.time, olympicEvent.name, olympicEvent.category FROM olympicEvent INNER JOIN updatedEvent ON olympicEvent.id=updatedEvent.olympicEventID";
    $query1_result = mysqli_query($mysqli, $query1);
    $counter = 1;
    echo"<tr>";
    while($row = mysqli_fetch_array($query1_result)) {
        echo "<td><h4>" . $row['oldLocation'] . " " . $row['oldDate'] . " " . $row['oldTime'] . " " . $row['oldName'] . " " . $row['oldCategory'] . " Has been changed to " . $row['location'] . " " . $row['date'] . " " . $row['time'] . " " . $row['name'] . " " . $row['category'] . "</h3></td>";
        if($counter % 3 == 0) {
            echo"</tr>";
            echo"<tr>";
        }
        $counter++;
    }
    echo"</tr>";
    echo "</table>"
    ?>
</div>
</body>
</html>