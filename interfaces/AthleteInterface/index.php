<?php
$thisPage="AthleteHome";
require 'components/athleteNav.php';
?>

<!-- TODO:
1) Align Logout button all the way to the right?
2) Assess what pages we need:  create/modify or combine into one? 
3) Why is navbar changing size outside of dashboard?
7) unable to get navbar-brand centered properly or white (need to add to CSS I think)
4) Fix font display of Title-->

<html>
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1><strong>Athlete Dashboard</strong></h1>     
        <h2>Select an action:</h2>
        <a href="reserveTickets.php"><button class="btn btn-danger btn-lg btn-block user-action-btn" style="background-color: #ff1a1a;">Reserve Tickets</button></a>
        <a href="scheduleAutograph.php"><button class="btn btn-danger btn-lg btn-block user-action-btn" style="background-color: #ff1a1a;">Schedule Autograph Session</button></a>
        <a href="viewSchedule.php"><button class="btn btn-danger btn-lg btn-block user-action-btn" style="background-color: #ff1a1a;">View Schedule</button></a>
      </div>
    </div>
  <?php require '../../components/footer.php' ?>
  </body>
</html>