<?php
// This page is used by Schedule Page to load db olympicEvents Table.
require '../Server/db_connection.php';
$mysqli->set_charset("utf8");
if ($_SERVER['REQUEST_METHOD']=='POST') {
  echo "<hr />";
  echo "<div class=grid3>";
  echo "<span><strong>#</strong></span>";
  echo "<span><strong>Category</strong></span>";
  echo "<span><strong>Name</strong></span>";
  echo "<span><strong>Date</strong></span>";
  echo "<span><strong>Time</strong></span>";
  echo "<span><strong>Location</strong></span>";

  //Get value that was being sent from AJAX
  $date = $_GET['q'];
  $query ="SELECT * FROM olympicevent WHERE date = '$date' ORDER BY time ASC ";
  $run_query1 = mysqli_query($mysqli, $query);
  $checkquery = mysqli_num_rows($run_query1);
  if ($checkquery>0){
    //counter
    $counter = 1;
      //fetch association array and store in $row
      while ($row = mysqli_fetch_assoc($run_query1)){
        $time = $row['time'];
        echo "<span>".$counter."</span>";
        echo "<span>".$row['category']."</span>";
        echo "<span>".$row['name']."</span>";
        echo "<span>".$row['date']."</span>";
        echo "<span>".(date('h:i A', strtotime($row['time'])))."</span>";
        echo "<span>".$row['location']."</span>";
        $counter++;
      }
  }
}
?>
