<?php
$thisPage="PublicHome";
require 'components/publicNav.php';
?>

<!-- TODO:
1) Align Logout button all the way to the right?
2) Assess what pages we need:  create/modify or combine into one? 
3) Why is navbar changing size outside of dashboard?
5) Links are suggested only
7) unable to get navbar-brand centered properly or white (need to add to CSS I think)
6) color is suggested only-->

<html>
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1><strong>Public Dashboard</strong></h1>     
        <h2>Select an action:</h2>
        <a href="viewSchedule.php"><button class="btn btn-primary btn-lg btn-block user-action-btn" style="background-color: #005ce6;">View Schedule</button></a>
        <a href="purchaseTickets.php"><button class="btn btn-primary btn-lg btn-block user-action-btn" style="background-color: #005ce6;">Purchase Tickets</button></a>
        <a href="viewOrders.php"><button class="btn btn-primary btn-lg btn-block user-action-btn" style="background-color: #005ce6;">View Orders</button></a>
      </div>
  </div>
  <?php require 'components/publicFooter.php'; ?>
  </body>
</html>