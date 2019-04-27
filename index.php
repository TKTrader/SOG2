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
          <img src="assets/bell.png" height="30" alt="">
        </a>
</div>
</nav>

<div class="jumbotron jumbotron-fluid" style="background: transparent;">
  <div class="container">
    <h1 class="display-4">Explore</h1>
    <p class="lead">Learn about the 2016 Summer Olympic Games!</p>
  </div>
</div>


<div class="card-deck">

<div class="h-50 card" style="width: auto; border: none;">
  <img class="card-img-top" src="assets/athlete.png" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Athletes</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="athletePage.php" class="btn btn-primary">Learn more</a>
  </div>
</div>


<div class="h-50 card" style="width: auto; border: none;">
  <img class="card-img-top" src="assets/schedule.png" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Schedule</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="schedulePage.php" class="btn btn-primary">Learn more</a>
  </div>
</div>

<div class="h-50 card" style="width: auto; border: none;">
  <img class="card-img-top" src="assets/sports.png" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Events</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="eventsPage.php" class="btn btn-primary">Learn more</a>
  </div>

</div>

</div>

<div class="card bg-dark text-white" style="top: 25%;">
  <img class="card-img" src="assets/rio4.png" alt="Card image" style="width: auto; height: 55em;">
  <div class="card-img-overlay" style="margin: 25%; left: -12%;">
    <h2 class="card-title">Event Tickets!</h2>
    <p class="card-text">Learn more on how you can purcharse tickets to <br> your favortie olympic event.</p>
    <button type="button" class="btn btn-primary">Learn more</button>
  </div>
</div>

</body>
</html>
