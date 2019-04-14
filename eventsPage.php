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
        <a class="nav-item nav-link active" href="eventsPage.php">Events</a>
        <a class="nav-item nav-link" href="schedulePage.php">Schedule</a>
        <a class="nav-item nav-link" href="athletePage.php">Athletes</a>
        <a class="nav-item nav-link" href="registerPage.php">Register</a>
        <a class="nav-item nav-link" href="loginPage.php">Login</a>
        <a class="nav-item nav-link" href="logout.php"> Logout</a></li>
      </div>
    </div>
  </nav>

  <div class="grid_container">
    <div class="grid">
      <span><strong># </strong></span>
      <span><strong>Category</strong></span>
      <span><strong>Name</strong></span>
      <?php
        //Select everything from event table
        $sql ="SELECT * FROM eventList";

        //counter
        $counter = 1;
        //run sql code and store in $result
        $result = mysqli_query($mysqli, $sql);

        //Store the #  of rows in set
        $queryResult = mysqli_num_rows($result);

        //must at least have 1 row in result
        if ($queryResult>0){

          //fetch association array and store in $row
          while ($row = mysqli_fetch_assoc($result)){
            echo "<span>".$counter."</span>";
            echo "<span>".$row['category']."</span>";
            echo "<span>".$row['name']."</span>";
            $counter++;
          }
        }
       ?>
    </div>
  </div>
</body>
</html>
