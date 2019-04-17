<?php
//require 'db_connection.php'; //Added this to header.php, shouldn't need this but leaving in case someothing breaks.
require 'header.php';
//If form is post, it'll call itself and run the php code at top w/ method POST.
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['register'])) {
      require 'Controllers/registerService.php';
    }
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Summer Olympic Games</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="eventsPage.php">Events</a>
      <a class="nav-item nav-link" href="schedulePage.php">Schedule</a>
      <a class="nav-item nav-link" href="athletePage.php">Athletes</a>
      <a class="nav-item nav-link active" href="registerPage.php">Register</a>
      <a class="nav-item nav-link" href="loginPage.php">Login</a>
    </div>
  </div>
  <img class="img-responsive" width="70px" height="40px" src="assets/rio-2016-logo.png">
</nav>

<form class = "logContainer" action="registerPage.php" method="post">
  <h1>Register</h1>
  <input type="text" name="firstname" placeholder="First Name" required/>
  <input type="text" name="lastname" placeholder="Last Name" required/>
  <input type="email" name="email" placeholder="E-mail" required/>
  <input type="password" name="password" placeholder="Password" required/>
  <input type="submit" value="Submit" name='register' required/>
</form>
