<?php
//require 'db_connection.php'; //Added this to header.php, shouldn't need this but leaving in case someothing breaks.
require 'header.php';
//If form is post, it'll call itself and run the php code at top w/ method POST.
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['login'])) {
      require 'loginService.php';
    }
}
?>

<form class = "logContainer" action="loginService.php" method="post">
  <h1>Login</h1>
  <input type="email" name="email" placeholder="E-mail" required/>
  <input type="password" name="password" placeholder="Password" required/>
  <input type="submit" value="Submit" name="login" />
</form>
