<?php
require "header.php";
 ?>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Summer Olympic Games</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="eventsPage.php">Events</a>
      <a class="nav-item nav-link" href="schedulePage.php">Schedule</a>
      <a class="nav-item nav-link active" href="athletePage.php">Athletes</a>
      <a class="nav-item nav-link" href="registerPage.php">Register</a>
      <a class="nav-item nav-link" href="loginPage.php">Login</a>
    </div>
  </div>
  <a class="navbar-brand float-right" href="notificationPage.php">
    <img class="img-responsive" width="70px" height="40px" src="assets/rio-2016-logo.png">
  </a>
</nav>

<div class="athletePage_container">
    <hr>
    <?php
    //for now only name and country, could do sports later
    $query1 = "SELECT * FROM athletes INNER JOIN users ON athletes.id=users.id";
    echo "<table class=\"athletes\">";
    $query1_result = mysqli_query($mysqli, $query1);
    $counter = 1;
    echo"<tr>";
    while($row = mysqli_fetch_array($query1_result)) {
        echo "<td><h4>" . $row['firstName'] . " " . $row['lastName'] . "</h3><ul><li>" . $row['country'] . "</li><li>" .
            $row['DOB'] . "</li><li>" . $row['heightFeet'] ."'". $row['heightInch']."\""."</li><li>" . $row['wgt']  . "</ul></td>";
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