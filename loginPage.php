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

<form class = "logContainer" action="loginPage.php" method="post">
  <h1>Login</h1>
  <input type="email" name="email" placeholder="E-mail" required/>
  <input type="password" name="password" placeholder="Password" required/>
  <input type="submit" value="Submit" name="login" />
</form>
