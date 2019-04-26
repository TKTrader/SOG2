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
      <a class="nav-item nav-link" href="../logout.php"> Logout</a>
    </div>
  </div>
      <?php
//    Does athlete have an event he is competing in that got updated
        $query1 = "SELECT * FROM updatedEvent WHERE ID IN (SELECT eventID FROM athleteevent WHERE athleteID IN (SELECT id FROM users WHERE email = \"". $_SESSION['email'] ."\"));";
//    Has the user purchased a ticket to an event that got updated
          $query2 = "SELECT id FROM updatedEvent WHERE olympicEventID IN (SELECT eventID FROM ticketorder WHERE customerID IN (SELECT id FROM users WHERE email = \"". $_SESSION['email'] ."\"));";
          $query1_result = mysqli_query($mysqli, $query1);
          $row1 = mysqli_fetch_array($query1_result);
          $eventUpdated = !empty($row1);
          $query2_result = mysqli_query($mysqli, $query2);
          $row2 = mysqli_fetch_array($query2_result);
          $ticketUpdated = !empty($row2);
//    Picture that's displayed if you have a notification
          if($eventUpdated or $ticketUpdated) {
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
<div class="container">
  <div class="jumbotron">
    <h1>Athlete Dashboard</h1>    
        <h2>Select an action:</h2>
        <a class="btn btn-primary btn-lg btn-block" href="reserveTickets.php" style="background-color: #ff1a1a;">Reserve Tickets</button>
        <a class="btn btn-primary btn-lg btn-block" href="modifySchedule.php" style="background-color: #ff1a1a;">Schedule Autograph Session</button>
        <a class="btn btn-primary btn-lg btn-block" href="schedulePage.php" style="background-color: #ff1a1a;">View Schedule</button>
    <!-- </div>
</div> -->

</body>