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
        <a class="nav-item nav-link" href=".php">Autographs</a>
        <a class="nav-item nav-link" href=".php">Tickets</a>
        <a class="nav-item nav-link active" href="schedulePage.php">Schedule</a>
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

  <!--CALENDAR SECTION-->
  <div class="grid_container2">
    <span><h4>August 2016</h4></span>
    <form class = "Calendar action" action="schedulePage.php" method="post">
      <div class="grid2">
        <span><strong>Sunday</strong></span>
        <span><strong>Monday</strong></span>
        <span><strong>Tuesday</strong></span>
        <span><strong>Wednesday</strong></span>
        <span><strong>Thursday</strong></span>
        <span><strong>Friday</strong></span>
        <span><strong>Saturday</strong></span>
        <span></span>
        <span><button type="button" class="btn btn-link" disabled>1</button></span>
        <span><button type="button" class="btn btn-link" disabled>2</button></span>
        <?php
          $eventCounter = 3;
          $dayCounter = 22;
          $date = "2016-08-";
          while ($eventCounter < 22){
            $completeDate = $date."".$eventCounter;
            echo "<span><button  type='button' onclick='loadEvents(\"$completeDate\")' class='btn btn-link' value=".$eventCounter.">$eventCounter</button></span>";
            $eventCounter++;
          }
          while ($dayCounter < 32){
            /*echo "<span>".$dayCounter."</span>";*/
            echo "<span><button type='button' class='btn btn-link' disabled>".$dayCounter."</button></span>";
            $dayCounter++;
          }
        ?>
        <span></span>
        <span></span>
        <span></span>
      </div>
    </form>

    <div id="loadhere"></div>
  </div>
</body>

<script>
  function loadEvents(number) {

    //document.getElementById("demo").innerHTML = number; //This loads the correct value, value is being received.

    //create Var
    var xhttp;

    //Create an XMLHttpRequest object
    xhttp = new XMLHttpRequest();

    //Create the function to be executed when the server response is ready
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("loadhere").innerHTML = this.responseText;
      }
    };
    //Send the request off to a file on the server, Notice that a parameter (q) is added to the URL (with the content of the dropdown list)
    xhttp.open("POST", "../Controllers/getEvents.php?q="+number, true);
    xhttp.send();
  }
</script>
