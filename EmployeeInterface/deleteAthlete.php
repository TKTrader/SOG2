<?php
require 'employeeHeader.php';
require '../Controllers/checkAccess.php';

if ($access != 'E') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../Controllers/error.php");
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
      <a class="nav-item nav-link" href="../logout.php"> Logout</a></li>
    </div>
  </div>
</nav>

<!-- Add Employee ID -->
<div class="container">
<?php
  echo "ID: ".$_SESSION['first_name']." ".$_SESSION['last_name'];
?>
</div>

<div class="container">
    <div class="jumbotron">
    <p><b><h2>Select Athlete to Delete</h2></b></p>
    <select class="form-control" name="event" required >
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
    <div class="row form-group mt-3">
    <button type="submit" class="btn btn-primary" style="background-color: #ff0000;">Delete</button>
    </div>
</div>

<body>
<div class="container">
  <div class="jumbotron" style="background-color:#d6f5d6;">
  <p><b><h3>Navigate:</h3></b></p>
        <a class="btn btn-primary btn-lg btn-block" href="addAthlete.php" style="background-color: #009900;">Register New Athlete</button>
        <a class="btn btn-primary btn-lg btn-block" href="modifyAthlete.php" style="background-color: #0099ff;">Modify Athlete</button>
    <!-- </div>
</div> -->
</body>
