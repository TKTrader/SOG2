<?php
  require 'employeeHeader.php';
  require '../Controllers/checkAccess.php';
  $mysqli->set_charset("utf8");

  //Kick anyone not an employee out
  if ($access != 'E') {
      $_SESSION['message'] = 'Invalid Access';
      header("location: error.php");
  }

  if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['event_add'])) {

      //store posted values in vars
      $name = mysqli_real_escape_string($mysqli, $_POST['event_Name']);
      $category = mysqli_real_escape_string($mysqli, $_POST['category']);

      $insertquery1 = "INSERT INTO eventlist(name, category)
      VALUES ('$name', '$category')";
      mysqli_query($mysqli, $insertquery1);
    }
    else if (isset($_POST['event_delete'])) {
      //logic
    }
    else if (isset($_POST['category_add'])) {

      //store posted values in vars
      $newCategory = mysqli_real_escape_string($mysqli, $_POST['categoryName']);

      $insertquery2 = "INSERT INTO categorylist(category)
      VALUES ('$newCategory')";
      mysqli_query($mysqli, $insertquery2);
      //echo $newCategory;
    }
    else if (isset($_POST['category_delete'])) {
      //logic
    }
    else if (isset($_POST['type_add'])) {
      //logic
    }
    else if (isset($_POST['type_delete'])) {
      //logic
    }
    else if (isset($_POST['country_add'])) {
      //logic
    }
    else if (isset($_POST['country_delete'])) {
      //logic
    }
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
      <a class="nav-item nav-link" href="manageAthletes.php">Manage Athletes</a>
      <a class="nav-item nav-link" href="manageSchedule.php">Manage Schedule</a>
      <a class="nav-item nav-link" href="manageTickets.php">Manage Tickets</a>
      <a class="nav-item nav-link active" href="manageData_Lists.php">Managa Data Lists</a>
      <a class="nav-item nav-link" href="logout.php"> Logout</a></li>
    </div>
  </div>
</nav>

<!--Display ID-->
<?php
  echo "ID: ".$_SESSION['first_name']." ".$_SESSION['last_name']."<br /> Choose a list:";
?>

<body>
  <!--FUNCTIONALITY BUTTONS-->
  <button type="button" onclick="toggle_visibility('tog1');" class="btn btn-outline-info btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Event</button>
  <button type="button" onclick="toggle_visibility('tog2');" class="btn btn-outline-info btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Category</button>
  <button type="button" onclick="toggle_visibility('tog3');" class="btn btn-outline-info btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Type</button>
  <button type="button" onclick="toggle_visibility('tog4');" class="btn btn-outline-info btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Country</button>

  <!--Events Section-->
  <div id="tog1" style="display:none;" >
    <div class = "EUI_datalistContainer">
      <h4>Event</h4>
      <form class = "eventContainer" action="manageData_Lists.php" method="post">
        <div class = "grid8">
          <span>ADD:</span>
          <input class="form-control" type="text" name="event_Name" placeholder="Event Name" required/>
          <select class="form-control" name="category" required>
            <option value="" selected disabled hidden></option>
            <?php
            $query = "SELECT category FROM categorylist";
            $result = mysqli_query($mysqli, $query);
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value=".$row['category'].">".$row['category']."</option>";
            }
            ?>
          </select>
          <button type="submit" name="event_add" class="btn btn-success btn-block btn-sm">Submit</button>
        </div>
      </form>
      <form class = "eventContainer" action="manageData_Lists.php" method="post">
        <hr />
        <div class = "grid9">
          <span>DELETE:</span>
          <input class="form-control" type="text" name="event_Id" placeholder="Row id" required/>
          <button type="submit" name="event_delete" class="btn btn-danger btn-block btn-sm">Submit</button>
        </div>
      </form>
    </div>
  </div>

  <br />

  <!--Category Section-->
  <div id="tog2" style="display:none;" >
    <div class = "EUI_datalistContainer">
      <h4>Category</h4>
      <form class = "categoryContainer" action="manageData_Lists.php" method="post">
        <div class = "grid9">
          <span>ADD:</span>
          <input class="form-control" type="text" name="category_Name" placeholder="Category Name" required/>
          <button type="submit" name="category_add" class="btn btn-success btn-block btn-sm">Submit</button>
        </div>
      </form>
      <form class = "categoryContainer" action="manageData_Lists.php" method="post">
        <hr />
        <div class = "grid9">
          <span>DELETE:</span>
          <input class="form-control" type="text" name="category_Id" placeholder="Row id" required/>
          <button type="submit" name="category_delete" class="btn btn-danger btn-block btn-sm">Submit</button>
        </div>
      </form>
    </div>
  </div>

  <br />

  <!--Type Section-->
  <div id="tog3" style="display:none;" >
    <div class = "EUI_datalistContainer">
      <h4>Type</h4>
      <form class = "typeContainer" action="manageData_Lists.php" method="post">
        <div class = "grid9">
          <span>ADD:</span>
          <input class="form-control" type="text" name="type_Name" placeholder="Type Name" required/>
          <button type="submit" name="type_add" class="btn btn-success btn-block btn-sm">Submit</button>
        </div>
      </form>
      <form class = "typeContainer" action="manageData_Lists.php" method="post">
        <hr />
        <div class = "grid9">
          <span>DELETE:</span>
          <input class="form-control" type="text" name="type_Id" placeholder="Row id" required/>
          <button type="submit" name="type_delete" class="btn btn-danger btn-block btn-sm">Submit</button>
        </div>
      </form>
    </div>
  </div>

  <br />

  <!--Country Section-->
  <div id="tog4" style="display:none;" >
    <div class = "EUI_datalistContainer">
      <h4>Country</h4>
      <form class = "countryContainer" action="manageData_Lists.php" method="post">
        <div class = "grid9">
          <span>ADD:</span>
          <input class="form-control" type="text" name="country_Name" placeholder="Country Name" required/>
          <button type="submit" name="country_add" class="btn btn-success btn-block btn-sm">Submit</button>
        </div>
      </form>
      <form class = "countryContainer" action="manageData_Lists.php" method="post">
        <hr />
        <div class = "grid9">
          <span>DELETE:</span>
          <input class="form-control" type="text" name="country_Id" placeholder="Row id" required/>
          <button type="submit" name="country_delete" class="btn btn-danger btn-block btn-sm">Submit</button>
        </div>
      </form>
    </div>
  </div>


</body>

<script>
  function toggle_visibility(id) {
     var e = document.getElementById(id);
     if(e.style.display == 'block')
        e.style.display = 'none';
     else
        e.style.display = 'block';
  }
</script>
