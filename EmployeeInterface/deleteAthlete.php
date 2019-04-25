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
  }
}
?>
<!-- Navbar -->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #009900;">
  <a class="navbar-brand navbar-dark"><font color="white">Summer Olympic Games</font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="index.php">Dashboard<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="manageAthletes.php">Manage Athletes</a>
      <a class="nav-item nav-link" href="manageSchedule.php">Manage Schedule</a>
      <a class="nav-item nav-link" href="manageTickets.php">Manage Tickets</a>
      <a class="nav-item nav-link" href="manageData_Lists.php">Managa Data Lists</a>
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
