<?php
  require 'employeeHeader.php';
  require '../Controllers/checkAccess.php';
  $mysqli->set_charset("utf8");

  //Kick anyone not an employee out
  if ($access != 'E') {
      $_SESSION['message'] = 'Invalid Access';
      header("location: ../Controllers/error.php");
  }

  if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['event_add'])) {

      //store posted values in vars
      $name = mysqli_real_escape_string($mysqli, $_POST['event_Name']);
      $category = mysqli_real_escape_string($mysqli, $_POST['category']);

      //query to insert event
      $newEvent = "INSERT INTO eventlist(name, category) VALUES ('$name', '$category')";
      mysqli_query($mysqli, $newEvent);
    }
    else if (isset($_POST['event_delete'])) {
      //Store posted var
      $rowid = mysqli_real_escape_string($mysqli, $_POST['event_Id']);

      //query to delete
      $deleteEvent = "DELETE FROM eventlist WHERE id = '$rowid'";
      mysqli_query($mysqli, $deleteEvent);
    }
    else if (isset($_POST['category_add'])) {

      //store posted values in vars
      $newCategory = mysqli_real_escape_string($mysqli, $_POST['category_Name']);

      $insertCategory = "INSERT INTO categorylist(category) VALUES ('$newCategory')";
      mysqli_query($mysqli, $insertCategory);
    }
    else if (isset($_POST['category_delete'])) {
      //Store posted vars
      $rowid = mysqli_real_escape_string($mysqli, $_POST['category_Id']);

      //query to delete from table
      $deleteCategory = "DELETE FROM categorylist WHERE id = '$rowid'";
      mysqli_query($mysqli, $deleteCategory);
    }
    else if (isset($_POST['type_add'])) {
      //store posted values to vars
      $typeName = mysqli_real_escape_string($mysqli, $_POST['type_Name']);

      //query to insert
      $newType = "INSERT INTO typelist(type) VALUES ('$typeName')";
      mysqli_query($mysqli, $newType);
    }
    else if (isset($_POST['type_delete'])) {
      //store posted values into vars
      $rowid = mysqli_real_escape_string($mysqli, $_POST['type_Id']);

      //queery to delete the row from db table
      $deleteType = "DELETE FROM typelist WHERE id = '$rowid'";
      mysqli_query($mysqli, $deleteType);
    }
    else if (isset($_POST['country_add'])) {
      //Store posted values to vars
      $countryName = mysqli_real_escape_string($mysqli, $_POST['country_Name']);

      //Query to insert new country
      $newCountry = "INSERT INTO countrylist(name) VALUES ('$countryName')";
      mysqli_query($mysqli, $newCountry);
    }
    else if (isset($_POST['country_delete'])) {
      //Store posted values into vars
      $rowid = mysqli_real_escape_string($mysqli, $_POST['country_Id']);

      //query to remove country
      $deleteCountry = "DELETE FROM countrylist WHERE id = '$rowid'";
      mysqli_query($mysqli, $deleteCountry);
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
      <a class="nav-item nav-link" href="reserveTickets.php">Reserve Tickets</a>
      <a class="nav-item nav-link" href="viewOrders.php">View Orders</a>
      <a class="nav-item nav-link active" href="manageData_Lists.php">Manage Data Lists</a>
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

<body>

  </br>
  <p>
    Select an action:
    <!--FUNCTIONALITY BUTTONS-->
    <button type="button" onclick="toggle_visibility('tog1');" class="btn btn-outline-info btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Event</button>
    <button type="button" onclick="toggle_visibility('tog2');" class="btn btn-outline-info btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Category</button>
    <button type="button" onclick="toggle_visibility('tog3');" class="btn btn-outline-info btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Type</button>
    <button type="button" onclick="toggle_visibility('tog4');" class="btn btn-outline-info btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Country</button>
  </p>

  <!--Events Section-->
  <div id="tog1" style="display:none;" >
    <div class = "EUI_datalistContainer">
      <h4>Event</h4>
      <form class = "eventContainer" action="manageData_Lists.php" method="post">
        <div class = "grid8">
          <span>ADD:</span>
          <input class="form-control" type="text" name="event_Name" placeholder="Event Name" required/>
          <select class="form-control" name="category" required>
            <option value="" selected disabled hidden>Pick a category</option>
            <?php
            $query = "SELECT category FROM categorylist";
            $result = mysqli_query($mysqli, $query);
            while ($row = mysqli_fetch_assoc($result)) {
              //echo "<option value=".$row['category'].">".$row['category']."</option>"; ////Can have bug with long strings with spaces
              $value = $row['category'];
              echo "<option value='$value'>$value</option>";
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
      <div class="grid_container">
        <div class="grid_b">
          <span><strong># </strong></span>
          <span><strong>Category</strong></span>
          <span><strong>Name</strong></span>
          <?php
            //Select everything from event table
            $sql ="SELECT * FROM eventList";

            //Counter var
            $counter = 1;

            //run sql code and store in $result
            $result = mysqli_query($mysqli, $sql);

            //Store the #  of rows in set
            $queryResult = mysqli_num_rows($result);

            //must at least have 1 row in result
            if ($queryResult>0){

              //fetch association array and store in $row
              while ($row = mysqli_fetch_assoc($result)){
                if ($counter % 2 != 0){
                  echo "<span style='background-color:#EEEEEE;'>".$row['id']."</span>";
                  echo "<span style='background-color:#EEEEEE;'>".$row['category']."</span>";
                  echo "<span style='background-color:#EEEEEE;'>".$row['name']."</span>";
                  $counter++;
                }else{
                  echo "<span>".$row['id']."</span>";
                  echo "<span>".$row['category']."</span>";
                  echo "<span>".$row['name']."</span>";
                  $counter++;
                }
              }
            }
           ?>
        </div>
      </div>
    </div>
    <br /><br />
  </div>

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
      <div class="grid_container10">
        <div class="grid10_scroll">
          <span><strong># </strong></span>
          <span><strong>Category</strong></span>
          <?php
            //Select everything from event table
            $sql ="SELECT * FROM categorylist";

            //Counter var
            $counter = 1;

            //run sql code and store in $result
            $result = mysqli_query($mysqli, $sql);

            //Store the #  of rows in set
            $queryResult = mysqli_num_rows($result);

            //must at least have 1 row in result
            if ($queryResult>0){

              //fetch association array and store in $row
              while ($row = mysqli_fetch_assoc($result)){
                if ($counter % 2 != 0){
                  echo "<span style='background-color:#EEEEEE;'>".$row['id']."</span>";
                  echo "<span style='background-color:#EEEEEE;'>".$row['category']."</span>";
                  $counter++;
                }else{
                  echo "<span>".$row['id']."</span>";
                  echo "<span>".$row['category']."</span>";
                  $counter++;
                }
              }
            }
           ?>
        </div>
      </div>
    </div>
    <br /><br />
  </div>

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
      <div class="grid_container10">
        <div class="grid10">
          <span><strong># </strong></span>
          <span><strong>Type</strong></span>
          <?php
            //Select everything from event table
            $sql ="SELECT * FROM typelist";

            //Counter var
            $counter = 1;

            //run sql code and store in $result
            $result = mysqli_query($mysqli, $sql);

            //Store the #  of rows in set
            $queryResult = mysqli_num_rows($result);

            //must at least have 1 row in result
            if ($queryResult>0){

              //fetch association array and store in $row
              while ($row = mysqli_fetch_assoc($result)){
                if ($counter % 2 != 0){
                  echo "<span style='background-color:#EEEEEE;'>".$row['id']."</span>";
                  echo "<span style='background-color:#EEEEEE;'>".$row['type']."</span>";
                  $counter++;
                }else{
                  echo "<span>".$row['id']."</span>";
                  echo "<span>".$row['type']."</span>";
                  $counter++;
                }
              }
            }
          ?>
        </div>
      </div>
    </div>
    <br /><br />
  </div>

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
      <div class="grid_container10">
        <div class="grid10_scroll">
          <span><strong># </strong></span>
          <span><strong>Country</strong></span>
          <?php
            //Select everything from event table
            $sql ="SELECT * FROM countrylist";

            //Counter var
            $counter = 1;

            //run sql code and store in $result
            $result = mysqli_query($mysqli, $sql);

            //Store the #  of rows in set
            $queryResult = mysqli_num_rows($result);

            //must at least have 1 row in result
            if ($queryResult>0){

              //fetch association array and store in $row
              while ($row = mysqli_fetch_assoc($result)){
                if ($counter % 2 != 0){
                  echo "<span style='background-color:#EEEEEE;'>".$row['id']."</span>";
                  echo "<span style='background-color:#EEEEEE;'>".$row['name']."</span>";
                  $counter++;
                }else{
                  echo "<span>".$row['id']."</span>";
                  echo "<span>".$row['name']."</span>";
                  $counter++;
                }
              }
            }
          ?>
        </div>
      </div>
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
