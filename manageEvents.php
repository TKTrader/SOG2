<?php
require 'static/header.php';
require 'Controllers/checkAccess.php';

//If person trying to access page is not authorized, boot them.
if ($access != 'E'){
  $_SESSION['message'] = 'Invalid Access';
  header("location: error.php");
}
if ($_SERVER['REQUEST_METHOD']=='POST') {
  if (isset($_POST['event'])) {

    //store posted values in vars
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $category = mysqli_real_escape_string($mysqli, $_POST['category']);

    $insertquery1 = "INSERT INTO eventlist(name, category)
    VALUES ('$name', '$category')";
    mysqli_query($mysqli, $insertquery1);
  }else if (isset($_POST['category'])) {

    //store posted values in vars
    $newCategory = mysqli_real_escape_string($mysqli, $_POST['categoryName']);

    $insertquery2 = "INSERT INTO categorylist(category)
    VALUES ('$newCategory')";
    mysqli_query($mysqli, $insertquery2);
    //echo $newCategory;
  }
}
?>
<?php require 'static/nav.php'; ?>
<form class = "eventContainer" action="manageEvents.php" method="post">
  <h4>Add An Event</h4>
  <input type="text" name="name" placeholder="Event Name" required/>
  <select name="category">
    <?php
    $query = "SELECT category FROM categorylist";
    $result = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<option value=".$row['category'].">".$row['category']."</option>";
    }
    ?>
  </select>
  <input type="submit"  name="event" />
</form>

<form class = "categoryContainer" action="manageEvents.php" method="post">
  <h4>Add A Category</h4>
  <input type="text" name="categoryName" placeholder="Category Name" required/>
  <input type="submit" name="category" />
</form>

<!--
<select>
  <?php
  //DROP DOWN events
  $query = "SELECT name FROM eventlist";
  $result = mysqli_query($mysqli, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    //<option value="volvo">Volvo</option>
    echo "<option value=".$row['name'].">".$row['name']."</option>";
  }
  ?>
</select>
-->
<?php require 'static/footer.php'; ?>