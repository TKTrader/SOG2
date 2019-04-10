<?php
require 'employeeHeader.php';
?>

<!-- TODO:
1) Align Logout button all the way to the right?
2) Assess what pages we need:  create/modify or combine into one?
3) Why is navbar changing size outside of dashboard?
4) Fix font display of Title
5) Links are suggested only
6) need to change CSS file to get navbar-brand text to be white, also not centered properly
6) color scheme suggested only-->

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #009900;">
<!--  <a class="navbar-brand navbar-dark"><span class="h2"><p class="font-weight-bold"><font color="white">Summer Olympic Games</font></p></span></a> Extra formatting not needed-->
<a class="navbar-brand navbar-dark"><font color="white">Summer Olympic Games</font></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="employeeIndex.php">Dashboard<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="addAthletes.php">Add Athletes</a>
      <a class="nav-item nav-link" href="manageSchedule.php">Manage Schedule</a>
      <a class="nav-item nav-link" href="modifyTickets.php">Modify Tickets</a>
      <a class="nav-item nav-link" href="logout.php"> Logout</a></li>
    </div>
  </div>
</nav>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <div class="jumbotron">
    <h1>Employee Dashboard</h1>
        <h2>Select an action:</h2>
        <a class="btn btn-primary btn-lg btn-block" href="addAthletes.php" style="background-color: #009900;">Add Athlete</button>
        <a class="btn btn-primary btn-lg btn-block" href="modifySchedule.php" style="background-color: #009900;">Modify Schedule</button>
        <a class="btn btn-primary btn-lg btn-block" href="manageSchedule.php" style="background-color: #009900;">Add Tickets</button>
        <a class="btn btn-primary btn-lg btn-block" href="modifyTickets.php" style="background-color: #009900;">Modify Tickets</button>-->
<!--     </div>
</div>-->
<!-- Above  div close is creating GUI issues, not sure why? -->
<!--The problem is in the style sheet-->
</body>