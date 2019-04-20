<?php
require 'employeeHeader.php';
require '../Controllers/checkAccess.php';

//Kick anyone not an employee out
if ($access != 'E') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../Controllers/error.php");
}
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #009900;">
<a class="navbar-brand navbar-dark"><font color="white">Summer Olympic Games</font></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="index.php">Dashboard<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="manageAthletes.php">Manage Athletes</a>
      <a class="nav-item nav-link" href="manageSchedule.php">Manage Schedule</a>
      <a class="nav-item nav-link" href="manageTickets.php">Manage Tickets</a>
      <a class="nav-item nav-link" href="manageData_Lists.php">Manage Data Lists</a>
      <a class="nav-item nav-link" href="athlete_event_registration.php">Athlete Event Registration</a>
      <a class="nav-item nav-link" href="../logout.php"> Logout</a></li>
    </div>
  </div>
  <img class="img-responsive" width="70px" height="40px" src="../assets/rio-2016-logo.png">
  <span class="navbar-text">
      <a class="nav-item nav-link" style="color: #ffffff"> <?php echo "UserID: ".$_SESSION['first_name']." ".$_SESSION['last_name']; ?> </a>
  </span>
</nav>

<!-- Lower Navigation Panel -->
<body>
<div class="container">
  <div class="jumbotron" style="background-color:#d6f5d6;">
    <h1><strong>Employee Dashboard</strong></h1>
        <h2>Select an action:</h2>
        <a class="btn btn-primary btn-lg btn-block" href="manageAthletes.php" style="background-color: #009900;">Manage Athletes</button>
        <a class="btn btn-primary btn-lg btn-block" href="manageSchedule.php" style="background-color: #009900;">Manage Schedule</button>
        <a class="btn btn-primary btn-lg btn-block" href="manageTickets.php" style="background-color: #009900;">Manage Tickets</button>
    <!-- </div>
</div> -->
</body>
