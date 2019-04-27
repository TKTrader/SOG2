<?php
require 'athleteHeader.php';
require '../Controllers/checkAccess.php';
$mysqli->set_charset("utf8");

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
        <a class="nav-item nav-link" href="index.php">Dashboard <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="autographPage.php">Autographs</a>
        <a class="nav-item nav-link" href="reserveTickets.php">Tickets</a>
        <a class="nav-item nav-link active" href="schedulePage.php">Schedule</a>
        <a class="nav-item nav-link" href="viewOrders.php">View Orders</a>
        <a class="nav-item nav-link" href="../logout.php"> Logout</a>
      </div>
    </div>
    <?php
//    Does athlete have an event he is competing in that got updated
      $query1 = "SELECT notify FROM users WHERE email = \"".$_SESSION['email']."\"";
//    Has the user purchased a ticket to an event that got updated
      $notification = mysqli_fetch_array(mysqli_query($mysqli, $query1));
//    Picture that's displayed if you have a notification
      if($notification[0]==1) {
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
<h3>Your Schedule</h3>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Date</th>
            <th>Time</th>
            <th>Location</th>
        </tr>
    </thead>
    <?php
        //Retrieve all events this athlete is competing in, their autograph sessions, and events they bought tickets to and order them by date and time.
        $query2 = "SELECT * FROM olympicevent WHERE ID IN 
            (SELECT eventID FROM athleteEvent WHERE athleteID IN 
                (SELECT ID FROM users WHERE email = \"".$_SESSION['email']."\")) 
            OR name = \"".$_SESSION['first_name'].$_SESSION['last_name']."\" 
                OR ID IN 
                (SELECT eventID FROM ticketOrder WHERE customerID IN 
                    (SELECT ID FROM USERS WHERE email = \"".$_SESSION['email']."\")) ORDER BY date ASC, time ASC;";
        $query2_result = mysqli_query($mysqli, $query2);

        while($row2 = mysqli_fetch_array($query2_result)) {
            echo "<tr><td>".$row2['name']."</td><td>".$row2['category']."</td><td>".$row2['date']."</td><td>".$row2['time']."</td><td>".$row2['location']."</td></tr>";
        }
    ?>
</table>
</body>