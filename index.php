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
      <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
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
          <img src="bell.png" height="30" alt="">
        </a>
</div>
</nav>

<html>
  <body>
    <div id="body-wrapper">
      <main role="main">
        <section class="jumbotron text-center sogs-bg">
          <div class="container text-white" style="background-color: rgba(52, 58, 60, .6)">
            <h1 class="jumbotron-heading">Summer Olympic Games 2016</h1>
            <p class="lead">Welcome to the main website for the Summer Olympic Games of 2016!</p>
            <p class="lead">View some of our featured events!</p>
          </div>
        </section>

        <div class="album py-5 bg-light sogs-bg">
          <div class="container">
            <div class="text-center mb-4 text-white"><h2>Featured Events</h2></div>
            <div class="row">
              <?php 
              $mysqli -> set_charset("utf8");
              $query = "SELECT * FROM olympicevent";
                if ($result = $mysqli->query($query)) {
                    for ($i = 0; $i < 3; $i++) {
                        $row = $result -> fetch_assoc();
                        $eventName = $row["name"];
                        $date = $row["date"];
                        $time = $row["time"];
                        $location = $row["location"];
                        $type = $row["type"];
                        $category = $row["category"];
                        $ticketPrice = $row["ticketPrice"]; 
                        
                        if ($type == "comp") {
                          $type = "Competition";
                        } else if ($type == "award") {
                          $type = "Award Ceremony";
                        }
                        echo
                        '<div class="col-md-4">
                          <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                              <h4>Name: <span style="font-weight:normal;">'.$eventName.'</span></h4>
                              <h4>Category: <span style="font-weight:normal;">'.$category.'</span></h4>
                              <h4>Type: <span style="font-weight:normal;">'.$type.'</span></h4>
                              <p class="card-text">'.$location.' at '.$time.'</p>
                              <span class="text-muted">$'.$ticketPrice.'</span>
                            </div>
                          </div>
                        </div>';
                    }
                } 
              ?>            
            </div>
          </div>
        </div>
      </main>
    </div>
  </body>
</html>