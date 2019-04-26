<?php
require 'athleteHeader.php';
require '../Controllers/checkAccess.php';

//Kick anyone not an employee out
if ($access != 'A') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../Controllers/error.php");
}
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['AddtoSchedule_button'])) {

      //Storing all posted inputs into php vars
        $full_name = $_SESSION['first_name'] . $_SESSION['last_name'];
        $date_SELECTED = mysqli_real_escape_string($mysqli, $_POST['date']);
        $time_SELECTED = mysqli_real_escape_string($mysqli, $_POST['time']);
        $location_SELECTED = mysqli_real_escape_string($mysqli, $_POST['location']);
        $price_SELECTED = mysqli_real_escape_string($mysqli, $_POST['price']);
        $insertAutographQuery1 = "INSERT INTO olympicEvent(name, date, time, location, type, category, ticketPrice)"
        ."VALUES ('$full_name', '$date_SELECTED', '$time_SELECTED', '$location_SELECTED',  'autog', 'autograph',  '$price_SELECTED')";
        mysqli_query($mysqli, $insertAutographQuery1);
    }
}
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ff1a1a;">
    <a class="navbar-brand navbar-dark"><font color="white">Summer Olympic Games</font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="index.php">Dashboard<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="autographPage.php">Autographs</a>
      <a class="nav-item nav-link" href=".php">Tickets</a>
      <a class="nav-item nav-link" href="schedulePage.php">Schedule</a>
      <a class="nav-item nav-link" href="viewOrders.php">View Orders</a>
      <a class="nav-item nav-link" href="../logout.php"> Logout</a>
    </div>
  </div>
    <?php
//    Does athlete have an event he is competing in that got updated
      $query1 = "SELECT notify FROM users WHERE email = \"".$_SESSION['email']."\"";
//    Has the user purchased a ticket to an event that got updated
      $notification = mysqli_fetch_array(mysqli_query($mysqli, $query1));
//    Picture that's displayed if you have a notification
      if($notification[0]==1) {
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
    
  <button type="button" onclick="toggle_visibility('tog');" class="btn btn-outline-success btn-sm" data-toggle="button" aria-pressed="false" autocomplete="off">Add</button>
  
  <!--ADD SECTION-->
  <div id="tog" style="display:none;" >
    <div class = "AUI_autographContainer">
      <form class = "schedule" action="autographPage.php" method="post" accept-charset="utf-8">
        <h4>ADD</h4>
          <div class = "autoGrid">
            <span><strong>Date</strong></span>
            <span><strong>Time</strong></span>
            <span><strong>Location</strong></span>
            <span><strong>Price</strong></span>

            <!--Drop Down bars below-->
            <input class="form-control" type="date" value="2016-08-03" name="date">
            <input class="form-control" type="time" value="12:00:00" name="time">
            <select class="form-control" name="location">
              <option value="" selected disabled hidden></option>
              <?php
              $query = "SELECT name FROM arenalist";
              $result = mysqli_query($mysqli, $query);
              while ($row = mysqli_fetch_assoc($result)) {
                  $value = $row['name'];
                  echo "<option value='$value'>$value</option>";
              }
              ?>
            </select>
            <input type="text" class="form-control" name="price" placeholder="Price" required/>
          </div>
        <button type="submit" name="AddtoSchedule_button" class="btn btn-success btn-block btn-sm">Submit</button>
      </form>
      <hr>
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
  function loadEvents(number) {

    //create Var
    var xhttp;

    //Create an XMLHttpRequest object
    xhttp = new XMLHttpRequest();

    //Create the function to be executed when the server response is ready
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("loadhere").innerHTML = this.responseText;
      }
    };
    //Send the request off to a file on the server, Notice that a parameter (q) is added to the URL (with the content of the dropdown list)
    xhttp.open("POST", "../Controllers/getEvents_E.php?q="+number, true);
    xhttp.send();
  }
</script>
