<?php
require 'athleteHeader.php';
require '../Controllers/checkAccess.php';
//Logic to choose different header would go here, by default require header is there.
if ($access != 'A') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../Controllers/error.php");
}
?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ff1a1a;">
    <a class="navbar-brand navbar-dark" style="color:white;">Summer Olympic Games</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link " href="index.php">Dashboard<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link " href="autographPage.php">Autographs</a>
      <a class="nav-item nav-link" href="reserveTickets.php">Tickets</a>
      <a class="nav-item nav-link" href="schedulePage.php">Schedule</a>
      <a class="nav-item nav-link" href="viewOrders.php">View Orders</a>
      <a class="nav-item nav-link" href="../logout.php"> Logout</a>
    </div>
  </div>
  <span class="navbar-text">
      <a class="nav-item nav-link" style="color: #ffffff"> <?php echo "UserID: ".$_SESSION['first_name']." ".$_SESSION['last_name']; ?> </a>
  </span>
  <div class="bell">
    <a class="navbar-brand float-right" href="notificationPage.php">
          <img src="../assets/bell.png" height="30" alt="">
        </a>
</div>
</nav>
</body>
<body>
  <div class="notificationPage_container">
    <hr>
    <?php
    $query0 = "SELECT * FROM olympicEvent WHERE type = \"award\" AND id IN (SELECT eventID FROM athleteEvent WHERE athleteid IN (SELECT id FROM users WHERE email = \"".$_SESSION['email']."\"))";
    $query0_result = mysqli_query($mysqli, $query0);
    $query1 = "SELECT updatedEvent.name AS oldName, updatedEvent.date AS oldDate, updatedEvent.time AS oldTime, updatedEvent.location AS oldLocation, updatedEvent.type AS oldType, olympicEvent.id, olympicEvent.name, olympicEvent.date, olympicEvent.time, olympicEvent.location, olympicEvent.type, olympicEvent.category, olympicEvent.ticketPrice FROM olympicEvent INNER JOIN updatedEvent ON olympicEvent.id=updatedEvent.olympicEventID  WHERE olympicEvent.id IN (SELECT eventID FROM athleteEvent WHERE athleteid IN (SELECT id FROM users WHERE email = \"".$_SESSION['email']."\"))";
    while($row0 = mysqli_fetch_array($query0_result)) {
        echo "<h3><strong>Award Ceremony</strong></h3><br>";
        echo "<h3>An award ceremony you are taking part in has been scheduled on ".$row0['date']." at ".$row0['time'].".</h3><br><br>";
    }
    $query1_result = mysqli_query($mysqli, $query1);
    while($row = mysqli_fetch_array($query1_result)) {
        if($row['type']=="award"){
            echo "<h3><strong>Award Ceremony</strong></h3>";
            if($row['oldDate'] != $row['date'] and $row['oldTime'] != $row['time'] and $row['oldLocation'] != $row['location']) {
                echo "<h3>The event previously taking place at " . $row['oldLocation'] . " at " . $row['oldDate'] . " " . $row['oldTime'] . " is now at " . $row['location'] . " at " . $row['time'] . " " . $row['date'] . ".</h3>";
            }
            elseif($row['oldDate'] != $row['date'] and $row['oldTime'] != $row['time']){
                echo "<h3>The event previously taking place at " . $row['oldDate'] . " " . $row['oldTime'] . " is now at " . " at " . $row['date'] . " " . $row['time'] . ".</h3>";
            }
            elseif($row['oldTime'] != $row['time'] and $row['oldLocation'] != $row['location']){
                echo "<h3>The event previously taking place at " . $row['oldLocation'] . " at " . $row['oldTime'] . " is now at " . $row['location'] . " at " . $row['time'] . ".</h3>";
            }
            elseif($row['oldDate'] != $row['date'] and $row['oldLocation'] != $row['location']){
                echo "<h3>The event previously taking place at " . $row['oldLocation'] . " " . $row['oldTime'] . " is now at "  . $row['location'] . " " . $row['time'] . ".</h3>";
            }
            elseif($row['oldDate'] != $row['date']){
                echo "<h3>The event previously taking place at " . $row['oldDate'] . " is now at " . $row['date'] . ".</h3>";
            }
            elseif($row['oldTime'] != $row['time']){
                echo "<h3>The event previously taking place at " . $row['oldTime'] . " is now at " . $row['time'] . ".</h3>";
            }
            elseif($row['oldLocation'] != $row['location']){
                echo "<h3>The event previously taking place at " . $row['oldLocation'] . " is now at " . $row['location'] . ".</h3>";
            }
        }
        elseif($row['type']=="comp"){
            echo "<h3><strong>Competition Event</strong></h3><br>";
            if($row['oldDate'] != $row['date'] and $row['oldTime'] != $row['time'] and $row['oldLocation'] != $row['location']) {
                echo "<h3>The event previously taking place at " . $row['oldLocation'] . " at " . $row['oldDate'] . " " . $row['oldTime'] . " is now at " . $row['location'] . " at " . $row['time'] . " " . $row['date'] . ".</h3>";
            }
            elseif($row['oldDate'] != $row['date'] and $row['oldTime'] != $row['time']){
                echo "<h3>The event previously taking place at " . $row['oldDate'] . " " . $row['oldTime'] . " is now at " . " at " . $row['date'] . " " . $row['time'] . ".</h3>";
            }
            elseif($row['oldTime'] != $row['time'] and $row['oldLocation'] != $row['location']){
                echo "<h3>The event previously taking place at " . $row['oldLocation'] . " at " . $row['oldTime'] . " is now at " . $row['location'] . " at " . $row['time'] . ".</h3>";
            }
            elseif($row['oldDate'] != $row['date'] and $row['oldLocation'] != $row['location']){
                echo "<h3>The event previously taking place at " . $row['oldLocation'] . " " . $row['oldTime'] . " is now at "  . $row['location'] . " " . $row['time'] . ".</h3>";
            }
            elseif($row['oldDate'] != $row['date']){
                echo "<h3>The event previously taking place at " . $row['oldDate'] . " is now at " . $row['date'] . ".</h3>";
            }
            elseif($row['oldTime'] != $row['time']){
                echo "<h3>The event previously taking place at " . $row['oldTime'] . " is now at " . $row['time'] . ".</h3>";
            }
            elseif($row['oldLocation'] != $row['location']){
                echo "<h3>The event previously taking place at " . $row['oldLocation'] . " is now at " . $row['location'] . ".</h3>";
            }
        }
        elseif($row['type']=="autog"){
            echo "<h3><strong>Autograph Session</strong></h3><br>";
            if($row['oldDate'] != $row['date'] and $row['oldTime'] != $row['time'] and $row['oldLocation'] != $row['location']) {
                echo "<h3>The event previously taking place at " . $row['oldLocation'] . " at " . $row['oldDate'] . " " . $row['oldTime'] . " is now at " . $row['location'] . " at " . $row['time'] . " " . $row['date'] . ".</h3>";
            }
            elseif($row['oldDate'] != $row['date'] and $row['oldTime'] != $row['time']){
                echo "<h3>The event previously taking place at " . $row['oldDate'] . " " . $row['oldTime'] . " is now at " . " at " . $row['date'] . " " . $row['time'] . ".</h3>";
            }
            elseif($row['oldTime'] != $row['time'] and $row['oldLocation'] != $row['location']){
                echo "<h3>The event previously taking place at " . $row['oldLocation'] . " at " . $row['oldTime'] . " is now at " . $row['location'] . " at " . $row['time'] . ".</h3>";
            }
            elseif($row['oldDate'] != $row['date'] and $row['oldLocation'] != $row['location']){
                echo "<h3>The event previously taking place at " . $row['oldLocation'] . " " . $row['oldTime'] . " is now at "  . $row['location'] . " " . $row['time'] . ".</h3>";
            }
            elseif($row['oldDate'] != $row['date']){
                echo "<h3>The event previously taking place at " . $row['oldDate'] . " is now at " . $row['date'] . ".</h3>";
            }
            elseif($row['oldTime'] != $row['time']){
                echo "<h3>The event previously taking place at " . $row['oldTime'] . " is now at " . $row['time'] . ".</h3>";
            }
            elseif($row['oldLocation'] != $row['location']){
                echo "<h3>The event previously taking place at " . $row['oldLocation'] . " is now at " . $row['location'] . ".</h3>";
            }
        }
        echo "<br><br>";
    }
      
    
    echo"</tr>";
    echo "</table>";
      //remove notification from user who viewed this page
      $query1 = "UPDATE users SET notify = 0 WHERE email = \"".$_SESSION['email']."\"";
      mysqli_query($mysqli, $query1);
    ?>
</div>
</body>
</html>