<?php
$thisPage="EmployeeHome";
require 'components/employeeNav.php';
?>

<!-- TODO:
1) Align Logout button all the way to the right?
3) Why is navbar changing size outside of dashboard?  <-  Container?
-->

<html>
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1><strong>Employee Dashboard</strong></h1>
        <h2>Select an action:</h2>
        <a href="manageAthletes.php"><button class="btn btn-success btn-lg btn-block user-action-btn" style="background-color: #009900;">Manage Athletes</button></a>
        <a href="manageSchedule.php"><button class="btn btn-success btn-lg btn-block user-action-btn" style="background-color: #009900;">Manage Schedule</button></a>
        <a href="manageTickets.php"><button class="btn btn-success btn-lg btn-block user-action-btn" style="background-color: #009900;">Manage Tickets</button></a>
      </div>
    </div>
  <?php require '../../components/footer.php' ?>
  </body>
</html>