<?php
require 'athleteHeader.php';
require '../Controllers/checkAccess.php';

//Kick anyone not an employee out
if ($access != 'A') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../Controllers/error.php");
}
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ff1a1a;">
    <a class="navbar-brand navbar-dark" style="color:white;">Summer Olympic Games</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="index.php">Dashboard<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link " href="autographPage.php">Autographs</a>
      <a class="nav-item nav-link" href="reserveTickets.php">Tickets</a>
      <a class="nav-item nav-link" href="schedulePage.php">Schedule</a>
      <a class="nav-item nav-link" href="viewOrders.php">View Orders</a>
      <a class="nav-item nav-link" href="../logout.php"> Logout</a>
    </div>
  </div>
  <span class="navbar-text">
      <a class="nav-item nav-link" style="color: #ffffff"> <?php echo "UserID: ".$_SESSION['first_name']." ".$_SESSION['last_name']; ?> </a>
  </span>
    <?php
//    Does athlete have an event he is competing in that got updated
      $query1 = "SELECT notify FROM users WHERE email = \"".$_SESSION['email']."\"";
//    Has the user purchased a ticket to an event that got updated
      $notification = mysqli_fetch_array(mysqli_query($mysqli, $query1));
//    Picture that's displayed if you have a notification
      if($notification[0]==1) {
        echo "<a class=\"navbar-brand float-right\" href=\"notificationPage.php\">
                    <img class=\"img-responsive\" width=\"30em\" height=\"30em\" src=\"../assets/bell2.png\">
                 </a>";
      }
//    Picture that's displayed if you don't have a notification
      else{
        echo "<a class=\"navbar-brand float-right\" href=\"notificationPage.php\">
                <img class=\"img-responsive\" width=\"30em\" height=\"30em\" src=\"../assets/bell.png\">
             </a>";
      }
  ?>
</nav>
<body>
<div class="container">
  <div class="jumbotron">
    <h1>Athlete Dashboard</h1>    
        <h2>Select an action:</h2>
        <a class="btn btn-primary btn-lg btn-block" href="reserveTickets.php" style="background-color: #ff1a1a;">Reserve Tickets</button>
        <a class="btn btn-primary btn-lg btn-block" href="autographPage.php" style="background-color: #ff1a1a;">Schedule Autograph Session</button>
        <a class="btn btn-primary btn-lg btn-block" href="schedulePage.php" style="background-color: #ff1a1a;">View Schedule</button>
    <!-- </div>
</div> -->

</body>