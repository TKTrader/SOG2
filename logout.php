<?php
session_start();
session_unset();
session_destroy();
require 'header.php'
?>

<!DOCTYPE html>
<html>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Summer Olympic Games</a>
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
          Account Options
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="registerPage.php">Register</a>
            <a class="dropdown-item" href="loginPage.php">Login</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </div>
  </div>
  <div class="bell">
    <a class="navbar-brand float-right" href="#">
          <img src="assets/bell.png" height="30" alt="">
        </a>
</div>
</nav>

<img src="rio-2016-logo.png" alt="">

<body onload="logout()">
  <script>
    function logout() {
        alert("Successfully logged out!");
        
        window.location.href = "index.php";
  }
  </script>

</body>
</html>
