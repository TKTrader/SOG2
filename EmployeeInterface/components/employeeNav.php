<?php require 'components/employeeHeader.php'; ?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #009900;">
  <a class="navbar-brand navbar-dark"><font color="white">Summer Olympic Games</font></a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbar-nav">
      <li><a class="nav-item nav-link" href="../index.php">Home</a></li>
      <li <?php if ($thisPage=="EmployeeHome") echo "id=\"user-currentpage\""; ?>><a class="nav-item nav-link" href="index.php">Dashboard</a></li>
      <li <?php if ($thisPage=="ManageAthletes") echo "id=\"user-currentpage\""; ?>><a class="nav-item nav-link" href="manageAthletes.php">Manage Athletes</a></li>
      <li <?php if ($thisPage=="ManageSchedule") echo "id=\"user-currentpage\""; ?>><a class="nav-item nav-link" href="manageSchedule.php">Manage Schedule</a></li>
      <li <?php if ($thisPage=="ManageTickets") echo "id=\"user-currentpage\""; ?>><a class="nav-item nav-link" href="manageTickets.php">Manage Tickets</a></li>
      <li><a class="nav-item nav-link" href="../controllers/logout.php"> Logout</a></li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item nav-link"; style="color:white;"> <?php echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?> </li>
    </ul>
  </div>
</nav>