<?php
require 'employeeHeader.php';
require '../Controllers/checkAccess.php';

// Check User access
if ($access != 'E') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../Controllers/error.php");
}

// Enter athlete into database
if ($_SERVER['REQUEST_METHOD']=='POST') {
  if (isset($_POST['addAthleteButton'])) {
    // Store form variables with security to prevent SQL injection
      $firstName = mysqli_real_escape_string($mysqli, $_POST['firstName']);
      $lastName = mysqli_real_escape_string($mysqli, $_POST['lastName']);
      $country = mysqli_real_escape_string($mysqli, $_POST['country']);
      $dateOfBirth = mysqli_real_escape_string($mysqli, $_POST['dob']);
      $heightFeet = mysqli_real_escape_string($mysqli, $_POST['heightFeet']);
      $heightInch = mysqli_real_escape_string($mysqli, $_POST['heightInch']);
      $weight = mysqli_real_escape_string($mysqli, $_POST['weight']);
      $pwd = mysqli_real_escape_string($mysqli, password_hash($_POST['pwd'], PASSWORD_BCRYPT));
      $email = $firstName.$lastName."@sogs.com";
      $access = "A";
      $height = $heightFeet."'".$heightInch;

      // Check if user already exists
      $check = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
      if ($check->num_rows > 0) {
        echo "Athlete already exists";
        mysqli_free_result($check);
      }
      // insert Athlete info into user table
      $insertAthleteDB = "INSERT INTO users(firstName, lastName, email, password, access)"."VALUES ('$firstName', '$lastName', '$email', '$pwd',  '$access')";
      //   // check output (comment out)
      //   echo "firstName: ".$firstName." <br /> lastName: ".$lastName." <br /> country: ".$country.
      //   "<br /> DOB: ".$dateOfBirth."<br /> height: ".$height.
      //   "<br /> weight: ".$weight."<br />password: ".$pwd."<br/> email: ".$email;
      mysqli_query($mysqli, $insertAthleteDB);

      // insert secondary Athlete info into athletes table   
      $insertAthleteDB2 = "INSERT INTO athletes(id, country, heightFeet, heightInch, wgt, DOB)"
      ."VALUES ((SELECT id FROM users WHERE users.firstName='$firstName' AND users.lastName='$lastName'), '$country', '$heightFeet','$heightInch', '$weight',  '$dateOfBirth')";
      // echo "$insertAthleteDB2";
      // echo "id: ".$id." <br /> country: ".$country."<br /> height: ".$height."<br /> weight: ".$weight."<br />DOB: ".$dateOfBirth;
      $result= mysqli_query($mysqli, $insertAthleteDB2);
      if (!$result) {
        $_SESSION['message'] = 'Database Input Error';
        header("location: athleteError.php");
      } else {
        echo "SUCCESS!!";
      }
  }
}
?>
<!-- navbar -->
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
      <a class="nav-item nav-link" href="manageData_Lists.php">Manage Data Lists</a>
      <a class="nav-item nav-link" href="../logout.php"> Logout</a></li>
    </div>
  </div>
  <img class="img-responsive" width="70px" height="40px" src="../assets/rio-2016-logo.png">
  <span class="navbar-text">
    <a class="nav-item nav-link" style="color: #ffffff"> <?php echo "UserID: ".$_SESSION['first_name']." ".$_SESSION['last_name']; ?> </a>
  </span>
</nav>

<!-- main page -->
<body>
<div class="container">
<p style="text-align:center"><b><h2>Register New Athlete</h2></b></p>
</div>
<div class="container">
  <form class="athlete has-success" action="addAthlete.php" method="post">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="firstNameInput">First Name</label>
        <input type="text" class="form-control" name ="firstName" id="firstNameInput" placeholder="Enter first name" required>
      </div>
      <div class="form-group col-md-6">
        <label for="lastNameInput">Last Name</label>
        <input type="text" class="form-control" name="lastName" id="lastNameInput" placeholder="Enter last name" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="country">Country</label>
          <select class="form-control" name="country" required >
            <option value="" selected disabled hidden></option>
            <?php
            $mysqli->set_charset("utf8");
            $query = "SELECT name FROM countryList";
            $result = mysqli_query($mysqli, $query);
            while ($row = mysqli_fetch_assoc($result)) {
              $value = $row['name'];
              echo "<option value='$value'>$value</option>";
            }
            ?>
          </select>
      </div>
      <div class="form-group col-md-6">
        <label for="dob">Date of Birth</label>
        <input type="date" class="form-control" name ="dob" id="dob" value="2000-01-01" placeholder="Enter date of birth">
        <small id="dob" class="form-text text-muted">MM-DD-YYYY</small>
      </div>
    </div>
      <div class="form-row">
    <div class="form-group col-md-2">
      <label for="height">Height: feet</label>
      <input type="number" class="form-control" name="heightFeet" id="heightFeet" placeholder="Feet">
    </div>\
    <div class="form-group col-md-2">
      <label for="height">inches</label>
      <input type="number" class="form-control" name="heightInch" id="heightInch" placeholder="Inches">
    </div>
    <div class="form-group col-md-2">
      <label for="weight">Weight</label>
      <input type="number" class="form-control" name="weight" id="weight" placeholder="pounds">
    </div>
    <div class="form-group col-md-5">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="pwd" id="password" placeholder="Password" required>
    </div>
    </div>
    <button type="submit" name="addAthleteButton" class="btn btn-primary">Submit</button>
  </form>
</div>

<!-- Lower Navigation Panel -->
<div class="container">
  <div class="jumbotron" style="background-color:#ffffff;">
  <p><b><h3>Navigate:</h3></b></p>
    <a class="btn btn-primary btn-lg btn-block" href="modifyAthlete.php" style="background-color: #0099ff;">Modify Athlete</button>
    <a class="btn btn-primary btn-lg btn-block" href="deleteAthlete.php" style="background-color: #ff0000;">Delete Athlete</button>
    <!-- </div>
</div> -->
</body>
