<?php
require 'publicHeader.php';
?>

<!-- TODO:
Align Logout button all the way to the right
Assess what pages we need:  create/modify or combine into one? -->

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #005ce6;">
  <a class="navbar-brand navbar-dark">Summer Olympic Games</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="employeeIndex.php">Dashboard<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="addAthletes.php">Purchase Tickets</a>
      <a class="nav-item nav-link active" href="modifySchedule.php">View Orders</a>
      <a class="nav-item nav-link active" href="addTickets.php">View Schedule</a>
      <a class="nav-item nav-link active" href="logout.php"> Logout</a></li>
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
    <h1>Public Dashboard</h1>     
        <h2>Select an action:</h2>
        <a class="btn btn-primary btn-lg btn-block" href="addAthletes.php" style="background-color: #005ce6;">Purchase Tickets</button>
        <a class="btn btn-primary btn-lg btn-block" href="modifySchedule.php" style="background-color: #005ce6;">View Orders</button>
        <a class="btn btn-primary btn-lg btn-block" href="modifySchedule.php" style="background-color: #005ce6;">View Schedule</button>
    <!-- </div>
</div> -->
<!-- Above  div close is creating GUI issues, not sure why? -->
</body>