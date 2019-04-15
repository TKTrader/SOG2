<?php
require 'employeeHeader.php';
require '../Controllers/checkAccess.php';

//Kick anyone not an employee out
if ($access != 'E') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../Controllers/error.php");
}
?>

<!-- TODO:
1) Align Logout button all the way to the right?
3) Why is navbar changing size outside of dashboard?  <-  Container?
-->

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
      <a class="nav-item nav-link" href="manageData_Lists.php">Managa Data Lists</a>
      <a class="nav-item nav-link" href="../logout.php"> Logout</a></li>
    </div>
  </div>
</nav>

<!-- Add Employee ID -->
<div class="container">
<?php
  echo "ID: ".$_SESSION['first_name']." ".$_SESSION['last_name'];
?>
</div>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

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
<!-- Above  div close is creating GUI issues, not sure why? -->
<!--The problem is in the style sheet-->
</body>
