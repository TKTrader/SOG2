<?php
require 'publicHeader.php';
require '../Controllers/checkAccess.php';

//Logic to choose different header would go here, by default require header is there.
if ($access != 'P') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../Controllers/error.php");
}
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #005ce6;">
<a class="navbar-brand navbar-dark" style="color:white;">Summer Olympic Games</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="../logout.php"> Logout</a>
    </div>
  </div>
  <span class="navbar-text">
      <a class="nav-item nav-link" style="color: #ffffff"> <?php echo "UserID: ".$_SESSION['first_name']." ".$_SESSION['last_name']; ?> </a>
  </span>
  <div class="bell">
    <a class="navbar-brand float-right" href="notificationPage.php">
          <img src="../assets/bell.png" height="30" alt="">
        </a>
</div>
</nav>
</body>
<body>
  <div class="notificationPage_container">
    <hr>
    <?php
    $query1 = "SELECT * FROM olympicEvent WHERE type = \"award\"";
    $query1_result = mysqli_query($mysqli, $query1);
    while($row = mysqli_fetch_array($query1_result)) {
        echo "<h3>Award Ceremony: ".$row['name'].", ".$row['date'].", ".$row['time']."</h3><hr>";
    }
    echo"</tr>";
    echo "</table>";
    $query1 = "UPDATE users SET notify = 0 WHERE email = \"".$_SESSION['email']."\"";
    mysqli_query($mysqli, $query1);
    ?>
</div>
</body>
</html>