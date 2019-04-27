<?php
require 'employeeHeader.php';
require '../Controllers/checkAccess.php';

// Check User access
if ($access != 'E') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../Controllers/error.php");
}

// Delete selected user from database
if ($_SERVER['REQUEST_METHOD']=='POST') {
  if (isset($_POST['deleteAthleteButton'])) {
    // Store form variables with security to prevent SQL injection
      $firstName = mysqli_real_escape_string($mysqli, $_POST['firstName']);
      $lastName = mysqli_real_escape_string($mysqli, $_POST['lastName']);
      $id = mysqli_real_escape_string($mysqli, $_POST['id']);
      $access = "A";

      // delete Athlete from user table
      $deleteAthleteDB = "DELETE FROM users WHERE id='$id' AND firstName='$firstName' AND lastName='$lastName'";
      //   // check fields
        echo "firstName: ".$firstName." <br /> lastName: ".$lastName." id: ".$id;
      mysqli_query($mysqli, $deleteAthleteDB);

      $result= mysqli_query($mysqli, $deleteAthleteDB);
      if (!$result) {
        $_SESSION['message'] = 'Database Deletion Error';
        header("location: athleteError.php");
      } else {
        $_SESSION['message'] = 'Athlete Deleted!';
        header("location: dbSuccess.php");
      }
  }
}
?>
<!-- Navbar -->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #009900;">
  <a class="navbar-brand navbar-dark" style="color:white;">Summer Olympic Games</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="index.php">Dashboard<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="manageAthletes.php">Manage Athletes</a>
      <a class="nav-item nav-link" href="manageSchedule.php">Manage Schedule</a>
      <a class="nav-item nav-link" href="reserveTickets.php">Reserve Tickets</a>
      <a class="nav-item nav-link" href="viewOrders.php">View Orders</a>
      <a class="nav-item nav-link" href="manageData_Lists.php">Manage Data Lists</a>
      <a class="nav-item nav-link" href="athlete_event_registration.php">Event Registration</a>
      <a class="nav-item nav-link" href="../logout.php"> Logout</a>
    </div>
  </div>

  <span class="navbar-text">
    <a class="nav-item nav-link" style="color: #ffffff"> <?php echo "UserID: ".$_SESSION['first_name']." ".$_SESSION['last_name']; ?> </a>
  </span>
    <?php
//    Does athlete have an event he is competing in that got updated
      $query1 = "SELECT notify FROM users WHERE email = \"".$_SESSION['email']."\"";
//    Has the user purchased a ticket to an event that got updated
      $notification = mysqli_fetch_array(mysqli_query($mysqli, $query1));
//    Picture that's displayed if you have a notification
      if($notification[0]==1) {
        echo "<a class=\"navbar-brand float-right\" href=\"notificationPage.php\">
                    <img class=\"img-responsive\" width=\"30em\" height=\"30em\" src=\"../bell2.png\">
                 </a>";
      }
//    Picture that's displayed if you don't have a notification
      else{
        echo "<a class=\"navbar-brand float-right\" href=\"notificationPage.php\">
                <img class=\"img-responsive\" width=\"30em\" height=\"30em\" src=\"../bell.png\">
             </a>";
      }
    ?>
</nav>

<!-- Dashboard -->
<body>
<div class="container">
<form class="athlete has-success" action="deleteAthlete.php" method="post">
    <div class="jumbotron" style="background-color:#ffffff;">
    <p><b><h2>Delete Athlete</h2></b></p>
    <!-- display existing athletes lookup function -->
    <select class="form-control" name="displayAthleteNames" required >
      <option value="" selected disabled hidden></option>
      <?php
      $mysqli->set_charset("utf8");
      $query = "SELECT concat('id ',id,': ',firstName,' ',lastName) displayAthlete FROM users WHERE access='A'";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        $value = $row['displayAthlete'];
        echo "<option value='$value'>$value</option>";
      }
      ?>
    </select>
    <p><b><h3>Select Athlete above from Database</h3></b></p>

    <!-- id dropdown -->
    <div class="form-row">
    <select class="form-control col-md-2" name="id" required >
      <option value="" selected disabled hidden></option>
      <?php
      $mysqli->set_charset("utf8");
      $query = "SELECT id FROM users WHERE access='A'";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
          $value = $row['id'];
          echo "<option value='$value'>$value</option>";
      }
      ?>
    </select>

    <!-- first name dropdown -->
    <select class="form-control col-md-5" name="firstName" required >
      <option value="" selected disabled hidden></option>
      <?php
      $mysqli->set_charset("utf8");
      $query = "SELECT firstName FROM users WHERE access='A'";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
          $value = $row['firstName'];
          echo "<option value='$value'>$value</option>";
      }
      ?>
    </select>

    <!-- last name dropdown -->
    <select class="form-control col-md-5" name="lastName" required >
      <option value="" selected disabled hidden></option>
      <?php
      $mysqli->set_charset("utf8");
      $query = "SELECT lastName FROM users WHERE access='A'";
      $result = mysqli_query($mysqli, $query);
      while ($row = mysqli_fetch_assoc($result)) {
          $value = $row['lastName'];
          echo "<option value='$value'>$value</option>";
      }
      ?>
    </select>
    </div>

    <p><b><h3>Confirm information and submit to delete</h3></b></p>

    <!-- Delete Button -->
    <button type="submit" name="deleteAthleteButton" class="btn btn-primary" style="background-color: #ff0000;">Delete</button>
    </form>
</div>

<!-- Lower Navigation Panel -->
<div class="container">
  <div class="jumbotron" style="background-color:#ffffff;">
  <p><b><h3>Navigate:</h3></b></p>
        <a class="btn btn-primary btn-lg btn-block" href="addAthlete.php" style="background-color: #009900;">Register New Athlete</button>
        <a class="btn btn-primary btn-lg btn-block" href="modifyAthlete.php" style="background-color: #0099ff;">Modify Athlete</button>
    <!-- </div>
</div> -->
</body>
