<?php
//require 'db_connection.php'; //Added this to header.php, shouldn't need this but leaving in case someothing breaks.
require 'static/header.php';
//If form is post, it'll call itself and run the php code at top w/ method POST.
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['register'])) {
      require 'Controllers/registerService.php';
    }
}
?>
<?php require 'static/nav.php'; ?>
<form class = "logContainer" action="registerPage.php" method="post">
  <h1>Register</h1>
  <input type="text" name="firstname" placeholder="First Name" required/>
  <input type="text" name="lastname" placeholder="Last Name" required/>
  <input type="email" name="email" placeholder="E-mail" required/>
  <input type="password" name="password" placeholder="Password" required/>
  <input type="submit" value="Submit" name='register' required/>
</form>
<?php require 'static/footer.php'; ?>