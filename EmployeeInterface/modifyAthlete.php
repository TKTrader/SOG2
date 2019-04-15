<?php
require 'employeeHeader.php';
require '../Controllers/checkAccess.php';

// Check User access
if ($access != 'E') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../Controllers/error.php");
}

if (isset($_POST['submit'])) {
    echo "Button Working";
}

if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['submitButton'])) {
        echo "Button Working";
    }
}
?>

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
      <a class="nav-item nav-link" href="logout.php"> Logout</a></li>
    </div>
  </div>
</nav>

<!-- Add Employee ID -->
<div class="container">
<?php
  echo "Employee ID: ".$_SESSION['first_name']." ".$_SESSION['last_name'];
?>
</div>

<div class="container">
    <div class="jumbotron" style="background-color:#ffffff;">
    <p><b><h2>Select Athlete to Modify</h2></b></p>
    <div class="form-row">
    <select class="form-control col-md-6" name="event" required >
        <option value="" selected disabled hidden></option>
        <?php
        $mysqli->set_charset("utf8");
        $query = "SELECT concat(firstName,' ',lastName) fullName FROM users WHERE access='A'";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $value = $row['fullName'];
            echo "<option value='$value'>$value</option>";
        }
        ?>
    </select>
    <button type="submit" Name="submitButton" class="btn btn-primary">Display Info</button>
    </div>
    <?php
        if ( isset( $_POST['displayButton'] ) ) { 
        echo "button Posting";
        }
        ?>
    </div>
</div>

<!-- Create php here to display athlete info -->

<body>
<div class="container">
<p><b><h2>Modify Fields Below:</h2></b></p>
</div>

<!-- Form info -->
<div class="container">
  <form class="athlete has-success" action="modifyAthlete.php" method="post">
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
    <button type="submit" name="modifyAthleteButton" class="btn btn-primary">Submit</button>
  </form>
</div>


<!-- Lower Navigation Panel -->
<div class="container">
  <div class="jumbotron" style="background-color:#ffffff;">
  <p><b><h3>Navigate:</h3></b></p>
        <a class="btn btn-primary btn-lg btn-block" href="addAthlete.php" style="background-color: #009900;">Register New Athlete</button>
        <a class="btn btn-primary btn-lg btn-block" href="deleteAthlete.php" style="background-color: #ff0000;">Delete Athlete</button>
    <!-- </div>
</div> -->
</body>
