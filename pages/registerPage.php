<!-- require 'db_connection.php'; //Added this to header.php, shouldn't need this but leaving in case someothing breaks. -->
<?php $thisPage="Register";
//If form is post, it'll call itself and run the php code at top w/ method POST.
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['register'])) {
      require '../controllers/registerService.php';
    }
}
?>

<html>
  <body>
    <?php require '../components/nav.php'; ?>
    <div id="body-wrapper">
      <form class = "logContainer" action="registerPage.php" method="post">
        <h1>Register</h1>
        <input type="text" name="firstname" placeholder="First Name" required/>
        <input type="text" name="lastname" placeholder="Last Name" required/>
        <input type="email" name="email" placeholder="E-mail" required/>
        <input type="password" name="password" placeholder="Password" required/>
        <input type="submit" value="Submit" name='register' required/>
      </form>
    </div>
    <?php require '../components/footer.php'; ?>
  </body>
</html>