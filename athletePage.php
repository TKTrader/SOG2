<?php
require "header.php";
 ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <a class="navbar-brand" href="index.php">Summer Olympic Games</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="athletePage.php">Athletes</a>
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

<div class="athletePage_container">
    <hr>
    <?php
    //for now only name and country, could do sports later
    $query1 = "SELECT firstName, lastName, country, DATE_FORMAT(DOB, '%M-%D-%Y') AS DOB, heightFeet, heightInch, wgt FROM athletes INNER JOIN users ON athletes.id=users.id";
    echo "<table class=\"table\">";
    $query1_result = mysqli_query($mysqli, $query1);
    $counter = 1;
    echo"<tr>";
    while($row = mysqli_fetch_array($query1_result)) {
        echo "<td><h4>" . $row['firstName'] . " " . $row['lastName'] . "</h4><ul><li><strong>Country: </strong>" . $row['country'] . "</li><li><strong>Date of Birth: </strong>" .
            $row['DOB'] . "</li><li><strong>Height: </strong>" . $row['heightFeet'] ."'". $row['heightInch']."\""."</li><li><strong>Weight: </strong>" . $row['wgt']  . "</ul></td>";
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