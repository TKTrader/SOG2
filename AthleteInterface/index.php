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
    <a class="navbar-brand navbar-dark"><font color="white">Summer Olympic Games</font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="index.php">Dashboard<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href=".php">Autographs</a>
      <a class="nav-item nav-link" href="reserveTickets.php">Tickets</a>
      <a class="nav-item nav-link" href="schedulePage.php">Schedule</a>
      <a class="nav-item nav-link" href="viewOrders.php">View Orders</a>
      <a class="nav-item nav-link" href="../logout.php"> Logout</a></li>
    </div>
  </div>
  <img class="img-responsive" width="70px" height="40px" src="../assets/rio-2016-logo.png">
  <span class="navbar-text">
      <a class="nav-item nav-link" style="color: #ffffff"> <?php echo "UserID: ".$_SESSION['first_name']." ".$_SESSION['last_name']; ?> </a>
  </span>
</nav>

<body>
<div class="container">
  <div class="jumbotron">
    <h1>Athlete Dashboard</h1>
        <h2>Select an action:</h2>
        <a class="btn btn-primary btn-lg btn-block" href="reserveTickets.php" style="background-color: #ff1a1a;">Reserve Tickets</button>
        <a class="btn btn-primary btn-lg btn-block" href="modifySchedule.php" style="background-color: #ff1a1a;">Schedule Autograph Session</button>
        <a class="btn btn-primary btn-lg btn-block" href="modifySchedule.php" style="background-color: #ff1a1a;">View Schedule</button>
        <a class="btn btn-primary btn-lg btn-block" href="viewOrders.php" style="background-color: #ff1a1a;">View Orders</button>
    <!-- </div>
</div> -->
</body>
