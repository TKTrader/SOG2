<?php
// This page is used by manageSchedule to load db olympicEvents Table.
require '../Server/db_connection.php';
$mysqli->set_charset("utf8");
if ($_SERVER['REQUEST_METHOD']=='POST') {

  //Storing all posted inputs into php vars
  $row_SELECTED = mysqli_real_escape_string($mysqli, $_POST['id']);
  $event_SELECTED = mysqli_real_escape_string($mysqli, $_POST['event']);
  $category_SELECTED = mysqli_real_escape_string($mysqli, $_POST['category']);
  $date_SELECTED = mysqli_real_escape_string($mysqli, $_POST['date']);
  $time_SELECTED = mysqli_real_escape_string($mysqli, $_POST['time']);
  $location_SELECTED = mysqli_real_escape_string($mysqli, $_POST['location']);
  $type_SELECTED = mysqli_real_escape_string($mysqli, $_POST['type']);
  $price_SELECTED = mysqli_real_escape_string($mysqli, $_POST['price']);

  //Search to make sure there is a query 1st
  $search_it_exists = "SELECT id FROM olympicEvent WHERE id = '$row_SELECTED'";
  $run_query1 = mysqli_query($mysqli, $search_it_exists);
  $checkquery = mysqli_num_rows($run_query1);
  if ($checkquery > 0){

    //Update query
    $modifyQuery1 = "UPDATE olympicEvent
    SET name = '$event_SELECTED',
    date = '$date_SELECTED',
    time = '$time_SELECTED',
    location = '$location_SELECTED',
    type = '$type_SELECTED',
    category = '$category_SELECTED',
    ticketPrice = '$price_SELECTED'
    WHERE id = '$row_SELECTED'";

    //Run query
    mysqli_query($mysqli, $modifyQuery1);

  } else {
    //Prompt it failed
    echo "<script>alert('No results found')</script>";
  }
}
