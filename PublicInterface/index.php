<?php
require 'publicHeader.php';
require '../Controllers/checkAccess.php';

//Kick anyone not an employee out
if ($access != 'P' || $_SESSION['email']=='security@sogs.com') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../Controllers/error.php");
}
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #005ce6;">
<a class="navbar-brand navbar-dark" style="color:white;">Summer Olympic Games</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="index.php">Dashboard<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="purchaseTickets.php">Purchase Tickets</a>
      <a class="nav-item nav-link" href="viewOrders.php">View Orders</a>
      <a class="nav-item nav-link" href="schedulePage.php">View Schedule</a>
      <a class="nav-item nav-link" href="../logout.php"> Logout</a>
    </div>
  </div>
  <span class="navbar-text">
      <a class="nav-item nav-link" style="color: #ffffff"> <?php echo "UserID: ".$_SESSION['first_name']." ".$_SESSION['last_name']; ?> </a>
  </span>
    <?php
//    Does athlete have an event he is competing in that got updated
      $query1 = "SELECT notify FROM users WHERE email = \"".$_SESSION['email']."\"";
//    Has the user purchased a ticket to an event that got updated
      $notification = mysqli_fetch_array(mysqli_query($mysqli, $query1));
//    Picture that's displayed if you have a notification
      if($notification[0]==1) {
        echo "<a class=\"navbar-brand float-right\" href=\"notificationPage.php\">
                    <img class=\"img-responsive\" width=\"30em\" height=\"30em\" src=\"../assets/bell2.png\">
                 </a>";
      }
//    Picture that's displayed if you don't have a notification
      else{
        echo "<a class=\"navbar-brand float-right\" href=\"notificationPage.php\">
                <img class=\"img-responsive\" width=\"30em\" height=\"30em\" src=\"../assets/bell.png\">
             </a>";
      }
    ?>
</nav>

   
<!-- <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head> -->
<body>

<div class="container">
  <div class="jumbotron">
    <h1>Public Dashboard</h1>     
        <h2>Select an action:</h2>
        <a class="btn btn-primary btn-lg btn-block" href="purchaseTickets.php" style="background-color: #005ce6;">Purchase Tickets</button>
        <a class="btn btn-primary btn-lg btn-block" href="viewOrders.php" style="background-color: #005ce6;">View Orders</button>
        <a class="btn btn-primary btn-lg btn-block" href="schedulePage.php" style="background-color: #005ce6;">View Schedule</button>
    <!-- </div>
</div> -->
</body>