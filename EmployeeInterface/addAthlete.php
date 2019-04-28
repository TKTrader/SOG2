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
        $_SESSION['message'] =$firstName.' '.$lastName.' already exists in database!';
        header("location: athleteError.php");
        // echo "Athlete already exists";
        // mysqli_free_result($check);
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
        // $_SESSION['message'] = 'Database Input Error';
        $_SESSION['message'] =$firstName.' '.$lastName.' already exists in database or some other input error!';
        header("location: athleteError.php");
      } else {
        // $_SESSION['message'] = 'Athlete added';
        $_SESSION['message'] =$firstName.' '.$lastName.' successfully added to athlete database!';
        header("location: athleteSuccess.php");
      }
  }
}
?>
<!-- navbar -->
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
                    <img class=\"img-responsive\" width=\"30em\" height=\"30em\" src=\"../assets/bell2.png\">
                 </a>";
      }
//    Picture that's displayed if you don't have a notification
      else{
        echo "<a class=\"navbar-brand float-right\" href=\"notificationPage.php\">
                <img class=\"img-responsive\" width=\"30em\" height=\"30em\" src=\"../assets/bell.png\">
             </a>";
      }
    ?>
</nav>

<!-- main page with dropdowns, etc -->
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
        <input type="date" class="form-control" name ="dob" id="dob" placeholder="Enter date of birth">
      </div>
    </div>
      <div class="form-row">
    <div class="form-group col-md-2">
      <label for="height">Height: feet</label>
      <input type="number" min="3" max="8" class="form-control" name="heightFeet" id="heightFeet" placeholder="Feet">
    </div>\
    <div class="form-group col-md-2">
      <label for="height">inches</label>
      <input type="number" min="0" max="11"class="form-control" name="heightInch" id="heightInch" placeholder="Inches">
    </div>
    <div class="form-group col-md-2">
      <label for="weight">Weight</label>
      <input type="number" min="40" max="400" class="form-control" name="weight" id="weight" placeholder="pounds">
    </div>
    <div class="form-group col-md-5">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="pwd" id="password" placeholder="Password" required>
    </div>
    </div>
    <button type="submit" name="addAthleteButton" class="btn btn-primary">Submit</button>
  </form>
</div>

<!-- Display table of athletes in database -->
<div class="container">
<p><b><h2>Athlete Database</h2></b></p>
<table class="table table-striped table-bordered table-hover" id="dataTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Country</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Height</th>
            <th>Weight</th>
        </tr>
    </thead>
    <!-- Populate table of athletes with SQL -->
    <?php
        $query1 = "SELECT * FROM users INNER JOIN athletes ON users.id=athletes.id ORDER BY lastName ASC";
        $result = mysqli_query($mysqli,$query1) or die('Query fail: ' . mysqli_error());
    ?>
    <tbody>
      <?php while ($row = mysqli_fetch_array($result)) {
        $fullName = $row['firstName']." ".$row['lastName'];
        $height = $row['heightFeet']."'".$row['heightInch']."\"";
        $id = $row['id'];
        $country =$row['country'];
        $email = $row['email'];
        $dob = $row['DOB'];
        $weight = $row['wgt'];

        echo "<tr>
        <td>" . $id . "</td>
        <td>" . $fullName . "</td>
        <td>" . $country . "</td>
        <td>" . $email . "</td>
        <td>" . $dob . "</td>
        <td>" . $height . "</td>
        <td>" . $weight . "</td>
      </tr>"; }
  ?>
    </tbody>
</table>
</div>
</body>

<!-- Lower Navigation Panel -->
<div class="container" border: 10px solid gray;>
  <div class="jumbotron" border: 10px solid gray; style="background-color:#ffffff;">
  <p><b><h3>Navigate:</h3></b></p>
    <a class="btn btn-primary btn-lg btn-block" href="modifyAthlete.php" style="background-color: #0099ff;">Modify Athlete</button>
    <a class="btn btn-primary btn-lg btn-block" href="deleteAthlete.php" style="background-color: #ff0000;">Delete Athlete</button>
    <!-- </div>
</div> -->
