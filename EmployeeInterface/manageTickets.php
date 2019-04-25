<?php
require 'employeeHeader.php';
require '../Controllers/checkAccess.php';

//Kick anyone not an employee out
if ($access != 'E') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../Controllers/error.php");
}
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #009900;">
  <a class="navbar-brand navbar-dark"><font color="white">Summer Olympic Games</font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="index.php">Dashboard<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="manageAthletes.php">Manage Athletes</a>
      <a class="nav-item nav-link" href="manageSchedule.php">Manage Schedule</a>
      <a class="nav-item nav-link active" href="manageTickets.php">Manage Tickets</a>
      <a class="nav-item nav-link" href="manageData_Lists.php">Manage Data Lists</a>
      <a class="nav-item nav-link" href="athlete_event_registration.php">Athlete Event Registration</a>
      <a class="nav-item nav-link" href="../logout.php"> Logout</a>
    </div>
  </div>
    <?php
//    Has the user purchased a ticket to an event that got updated
      $query1 = "SELECT id FROM updatedEvent WHERE olympicEventID IN (SELECT eventID FROM ticketorder WHERE customerID IN (SELECT id FROM users WHERE email = \"". $_SESSION['email'] ."\"));";
      $query1_result = mysqli_query($mysqli, $query1);
      $row1 = mysqli_fetch_array($query1_result);
      $ticketUpdated = !empty($row1);
//    Picture that's displayed if you have a notification
      if($ticketUpdated) {
        echo "<a class=\"navbar-brand float-right\" href=\"notificationPage.php\">
                <img class=\"img-responsive\" width=\"70px\" height=\"40px\" src=\"../assets/notification.jpg\">
             </a>";
      }
//    Picture that's displayed if you don't have a notification
      else{
        echo "<a class=\"navbar-brand float-right\" href=\"notificationPage.php\">
                <img class=\"img-responsive\" width=\"70px\" height=\"40px\" src=\"../assets/rio-2016-logo.png\">
             </a>";
      }
  ?>
  <span class="navbar-text">
      <a class="nav-item nav-link" style="color: #ffffff"> <?php echo "UserID: ".$_SESSION['first_name']." ".$_SESSION['last_name']; ?> </a>
  </span>
</nav>

<body>
  <p>MODIFY TICKETS PAGE</p>
</body>
