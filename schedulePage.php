<?php
require 'header.php';
$mysqli->set_charset("utf8");
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Summer Olympic Games</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="eventsPage.php">Events</a>
      <a class="nav-item nav-link active" href="schedulePage.php">Schedule</a>
      <a class="nav-item nav-link" href="athletePage.php">Athletes</a>
      <a class="nav-item nav-link" href="registerPage.php">Register</a>
      <a class="nav-item nav-link" href="loginPage.php">Login</a>
      <a class="nav-item nav-link" href="logout.php"> Logout</a></li>
    </div>
  </div>
</nav>
</body>
</html>

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
    <span>1</span>
    <span>2</span>
    <?php
      $eventCounter = 3;
      $dayCounter = 22;

      while ($eventCounter < 22){
        echo "<span><input type=submit value=".$eventCounter." name=".$eventCounter." /></span>";
        $eventCounter++;
      }
      while ($dayCounter < 32){
        echo "<span>".$dayCounter."</span>";
        $dayCounter++;
      }
    ?>
    <span></span>
    <span></span>
    <span></span>
  </div>
</form>
  <div class="loadView_Container">
    <hr>
    <?php
    /*Note to self....refactor this ugo code when you have time*/
    /*idea: another way to implement this might be to load info into an array
      then pull from that array....maybe?*/
    if ($_SERVER['REQUEST_METHOD']=='POST') {
      echo "<div class=grid3>";
      echo "<span><strong>#</strong></span>";
      echo "<span><strong>Category</strong></span>";
      echo "<span><strong>Name</strong></span>";
      echo "<span><strong>Date</strong></span>";
      echo "<span><strong>Time</strong></span>";
      echo "<span><strong>Location</strong></span>";
      if (isset($_POST['3'])) {
        $query1 = "SELECT * FROM olympicevent WHERE date = '2016-08-03' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['4'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-04' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['5'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-05' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['6'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-06' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['7'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-07' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['8'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-08' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['9'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-09' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['10'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-10' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['11'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-11' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['12'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-12' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['13'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-13' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['14'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-14' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['15'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-15' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['16'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-16' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['17'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-17' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['18'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-18' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['19'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-19' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['20'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-20' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      if (isset($_POST['21'])) {
        $query1 = "SELECT * FROM olympicEvent WHERE date = '2016-08-21' ";
        $run_query1 = mysqli_query($mysqli, $query1);
        $checkquery = mysqli_num_rows($run_query1);
        if ($checkquery>0){
          //counter
          $counter = 1;
            //fetch association array and store in $row
            while ($row = mysqli_fetch_assoc($run_query1)){
              echo "<span>".$counter."</span>";
              echo "<span>".$row['category']."</span>";
              echo "<span>".$row['name']."</span>";
              echo "<span>".$row['date']."</span>";
              echo "<span>".$row['time']."</span>";
              echo "<span>".$row['location']."</span>";
              $counter++;
            }
        }
      }
      echo "</div>";
    }
    ?>
  </div>
</div>
