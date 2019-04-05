<?php
require 'header.php';
//If form is post, it'll call itself and run the php code at top w/ method POST.
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['login'])) {
      //require 'loginService.php';
      //require 'Controllers/loginService.php';
      //include __DIR__.'/Controllers/loginService.php';
      include '/Controllers/loginService.php';
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
      <a class="nav-item nav-link" href="registerPage.php">Register</a>
      <a class="nav-item nav-link active" href="loginPage.php">Login</a>
      <a class="nav-item nav-link" href="logout.php"> Logout</a></li>
    </div>
  </div>
</nav>
</body>
</html>

<form class = "logContainer" action="loginPage.php" method="post">
  <h1>Login</h1>
  <input type="email" name="email" placeholder="E-mail" required/>
  <input type="password" name="password" placeholder="Password" required/>
  <input type="submit" value="Submit" name="login" />
</form>
