<?php
require 'employeeHeader.php';
require '../Controllers/checkAccess.php';

if ($access != 'E') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: error.php");
}
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #009900;">
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
      <a class="nav-item nav-link" href="logout.php"> Logout</a></li>
    </div>
  </div>
</nav>

<body>
<p style="text-align:center"><b><h2>Register New Athlete</h2></b></p>
<div class="container">
  <form>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="firstNameInput">First Name</label>
        <input type="text" class="form-control" id="firstNameInput" aria-describedby="emailHelp" placeholder="Enter first name">
      </div>
      <div class="form-group col-md-6">
        <label for="lastNameInput">Last Name</label>
        <input type="text" class="form-control" id="lastNameInput" aria-describedby="emailHelp" placeholder="Enter last name">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="country">Country</label>
        <input type="text" class="form-control" id="country" aria-describedby="emailHelp" placeholder="Enter country">
      </div>
      <div class="form-group col-md-6">
        <label for="dob">Date of Birth</label>
        <input type="date" class="form-control" id="dob" aria-describedby="emailHelp" placeholder="Enter date of birth">
        <small id="dob" class="form-text text-muted">YYYY-MM-DD</small>
      </div>
    </div>
    <label for="exampleInputEmail1">Height</label>
    <div class="form-row">
      <div class="input-group col-md-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Feet</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01">
          <option selected>select...</option>
          <option value="1">4'</option>
          <option value="2">5'</option>
          <option value="3">6'</option>
          <option value="3">7'</option>
        </select>
      </div>
      <div class="input-group col-md-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Inches</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01">
          <option selected>select...</option>
          <option value="1">0"</option>
          <option value="2">1"</option>
          <option value="3">2"</option>
          <option value="3">3"</option>
          <option value="4">4"</option>
          <option value="5">5"</option>
          <option value="6">6"</option>
          <option value="7">7"</option>
          <option value="8">8"</option>
          <option value="9">9"</option>
          <option value="10">10"</option>
          <option value="11">11"</option>
        </select>
      </div>
    </div>

    <div class="form-group col-md-3">
      <label for="weight">Weight</label>
      <input type="number" class="form-control" id="weight" aria-describedby="emailHelp" placeholder="Enter weight in pounds">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
