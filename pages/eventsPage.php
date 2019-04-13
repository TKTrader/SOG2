<?php
require '../components/header.php';
require '../controllers/checkAccess.php';
$thisPage="Events";
?>
<?php
//check user is employee
if ($access == 'E'){
    echo "Welcome ".$_SESSION['first_name']." ".$_SESSION['last_name'];
    echo "<form action = '../controllers/manageEvents.php'>";
    echo "<button type='submit' name='ManageEvents'>Manage Events</button>";
    echo "</form>";
}
 ?>
 <body>
<?php require '../components/nav.php'; ?>
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
<?php require '../components/footer.php'; ?>
</body>

<!--TEMP OLD DATA

<div class="grid_container">
  <div class="grid">
    <span># </span>
    <span>Category</span>
    <span>Name</span>
    <span>Date</span>
    <span>Time</span>
    <span>Location</span>
  //  <?php
      //Select everything from event table
      //$sql ="SELECT * FROM olympicEvent";

      //counter
    //  $counter = 1;
      //run sql code and store in $result
      //$result = mysqli_query($mysqli, $sql);

      //Store the #  of rows in set
    //  $queryResult = mysqli_num_rows($result);

      //must at least have 1 row in result
      //if ($queryResult>0){

        //fetch association array and store in $row
        //while ($row = mysqli_fetch_assoc($result)){
        //  echo "<span>".$counter."</span>";
      //    echo "<span>".$row['category']."</span>";
      //    echo "<span>".$row['name']."</span>";
      //    echo "<span>".$row['date']."</span>";
      //    echo "<span>".$row['time']."</span>";
      //    echo "<span>".$row['location']."</span>";
      //    $counter++;
      //  }
    //  }
    // ?>
  </div>
</div>

-->