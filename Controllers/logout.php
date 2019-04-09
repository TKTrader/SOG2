<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Logged Out</title>
</head>
<body>
  <p>You are now logged out</p>
  <a href="index.php"><button class="button button-block"/>Home</button></a>
</body>
</html>
