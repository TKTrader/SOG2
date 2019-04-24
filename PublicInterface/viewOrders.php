<?php
require 'publicHeader.php';
require '../Controllers/checkAccess.php';

//Kick anyone not an employee out
if ($access != 'P') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../Controllers/error.php");
}
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #005ce6;">
<a class="navbar-brand navbar-dark"><font color="white">Summer Olympic Games</font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="index.php">Dashboard</a>
      <a class="nav-item nav-link" href="purchaseTickets.php">Purchase Tickets</a>
      <a class="nav-item nav-link active" href="viewOrders.php">View Orders<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="schedulePage.php">View Schedule</a>
      <a class="nav-item nav-link" href="../logout.php"> Logout</a></li>
    </div>
  </div>
  <img class="img-responsive" width="70px" height="40px" src="../assets/rio-2016-logo.png">
  <span class="navbar-text">
      <a class="nav-item nav-link" style="color: #ffffff"> <?php echo "UserID: ".$_SESSION['first_name']." ".$_SESSION['last_name']; ?> </a>
  </span>
</nav>

<html>
    <body>
        <div class="container-fluid p-4">
            <h2>Orders</h2>
            <?php
                // getting customer's ID
                $fName = $_SESSION['first_name'];
                $customerIdSql = "SELECT id FROM `users` WHERE firstName = '$fName'";
                $customerIdResult = mysqli_query($mysqli, $customerIdSql);
                $customerId = mysqli_fetch_assoc($customerIdResult)["id"];
                // querying all ticket orders from customer ID
                $ticketOrderSql  = "SELECT * FROM `ticketorder` WHERE customerID = '$customerId'";
                $ticketOrderResult = mysqli_query($mysqli, $ticketOrderSql);
                echo '<div class="table-responsive-sm table-responsive-md">
                        <table class="table table-bordered table-hover" id="ticketOrdersTable"> 
                            <thead class="thead-light">
                                <tr class=\'ticketOrdersTableRow\'> 
                                    <th scope="col" class=\'ticketOrdersHeader\'> <font face="Arial">Event Name</font> </th> 
                                    <th scope="col" class=\'ticketOrdersHeader\'> <font face="Arial"># of Tickets</font> </th> 
                                    <th scope="col" class=\'ticketOrdersHeader\'> <font face="Arial">Price</font> </th> 
                                    <th scope="col" class=\'ticketOrdersHeader\'> <font face="Arial">Time Stamp</font> </th> 
                                </tr>
                            </thead>
                        <tbody>';
                $value = 1;
                while ($ticketOrderRow = $ticketOrderResult -> fetch_assoc()) {
                    $numTickets = $ticketOrderRow["numTickets"];
                    $ticketPrice = $ticketOrderRow["ticketPrice"];
                    $orderTimeStamp = $ticketOrderRow["orderTimeStamp"];
                    $eventId = $ticketOrderRow["eventID"];
                    // getting event's Name
                    $eventNameSql = "SELECT name FROM `olympicevent` WHERE id = '$eventId'";
                    $eventNameResult = mysqli_query($mysqli, $eventNameSql);
                    $eventName = mysqli_fetch_assoc($eventNameResult)["name"];
                    echo '<tr class=\'row'.$value.'\' value='.$value.'> 
                            <td scope="row" id=\'eventId'.$value.'\' value='.$value.'>'.$eventName.'</td> 
                            <td id=\'numTickets'.$value.'\' value='.$value.'>'.$numTickets.'</td> 
                            <td id=\'ticketPrice'.$value.'\' value='.$value.'>'.$ticketPrice.'</td> 
                            <td id=\'orderTimeStamp'.$value.'\' value='.$value.'>'.$orderTimeStamp.'</td>
                        </tr>';
                    $value++;
                }
                echo '</tbody></table></div>';
            ?>
        </div>
    </body>
</html>