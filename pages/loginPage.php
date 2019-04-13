<?php $thisPage="Login"; ?>

<html>
  <body>
    <?php require '../components/nav.php';
    // if form is post, it'll call itself and run the php code at top w/ method POST.
    // this needs to be under wherever you call header so that it connects with the database
    if ($_SERVER['REQUEST_METHOD']=='POST') {
      if (isset($_POST['login'])) { include __DIR__.'/../controllers/loginService.php'; }
    }
    ?>
    <div id="body-wrapper">
      <form class="logContainer" action="loginPage.php" method="post">
        <h1>Login</h1>
        <input type="email" name="email" placeholder="E-mail" required/>
        <input type="password" name="password" placeholder="Password" required/>
        <input type="submit" value="Submit" name="login" />
      </form>
    </div>
    <?php require '../components/footer.php'; ?> 
  </body>
</html>