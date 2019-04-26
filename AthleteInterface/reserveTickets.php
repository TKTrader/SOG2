<?php
require 'athleteHeader.php';
require '../Controllers/checkAccess.php';
//Kick anyone not an employee out
if ($access != 'A') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../Controllers/error.php");
}
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['confirmPurchaseBtn'])) { 
        include __DIR__.'/processTicket.php';        
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
      <a class="nav-item nav-link" href="index.php">Dashboard</a>
      <a class="nav-item nav-link" href=".php">Autographs</a>
      <a class="nav-item nav-link active" href="reserveTickets.php">Tickets<span class="sr-only">(current)</span></a>
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

<html>
    <body>
        <div class="container-fluid p-4">
            <h2>Available Events</h2>
            <?php
                $mysqli -> set_charset("utf8");
                $query = "SELECT * FROM olympicevent";
                echo '<div class="table-responsive-sm table-responsive-md">
                        <table class="table table-bordered table-hover" id="ticketTable"> 
                            <thead class="thead-light">
                                <tr class=\'ticketTableHeaderRow\'> 
                                    <th scope="col" style="display:none;"> <font face="Arial">ID</font> </th> 
                                    <th scope="col"> <font face="Arial">Event Name</font> </th> 
                                    <th scope="col"> <font face="Arial">Date</font> </th> 
                                    <th scope="col"> <font face="Arial">Time</font> </th> 
                                    <th scope="col"> <font face="Arial">Location</font> </th> 
                                    <th scope="col"> <font face="Arial">Type</font> </th> 
                                    <th scope="col"> <font face="Arial">Category</font> </th>
                                    <th scope="col"></td>
                                </tr>
                            </thead>
                        <tbody>';
                $value = 1;
                if ($result = $mysqli->query($query)) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $eventName = $row["name"];
                        $date = $row["date"];
                        $time = $row["time"];
                        $location = $row["location"];
                        $type = $row["type"];
                        $category = $row["category"];
                        echo '<tr value='.$value.'> 
                                <td id=\'ticketEventId'.$value.'\' value='.$value.' style="display:none;">'.$id.'</td> 
                                <td id=\'ticketEventName'.$value.'\' value='.$value.'>'.$eventName.'</td> 
                                <td id=\'ticketDate'.$value.'\' value='.$value.'>'.$date.'</td> 
                                <td id=\'ticketTime'.$value.'\' value='.$value.'>'.$time.'</td> 
                                <td id=\'ticketLocation'.$value.'\' value='.$value.'>'.$location.'</td> 
                                <td id=\'ticketType'.$value.'\' value='.$value.'>'.$type.'</td> 
                                <td id=\'ticketCategory'.$value.'\' value='.$value.'>'.$category.'</td> 
                                <td class="text-center"><button type=\'button\' class=\'btn\' data-toggle="modal" data-target="#purchaseModal" value='.$value.' onClick="setCurrentTicket(this)">Reserve Ticket</button></td>
                            </tr>';
                        $value++;
                    }
                    echo '</tbody></table></div>';
                } 
            ?>
        </div>
        </body>
        
        <script>
            var globalVal;
            var currEventName;
            var currEventNameText;
            var currTicketEventId;
            var currTicketEventIdText;
            function setCurrentTicket(element){
                var value = element.value;
                globalVal = value;
                currEventName = document.getElementById('ticketEventName' + globalVal);
                currEventNameText = currEventName.innerHTML;
                currTicketEventId = document.getElementById('ticketEventId' + globalVal);
                currTicketEventIdText = currTicketEventId.innerHTML;
                document.getElementById('purchaseModalTitle').innerHTML = "Event: " + currEventNameText;
                document.getElementById('confirmTicketPurchaseBtn').innerHTML = "Confirm TTicket";
                document.getElementById('formTicketOrderEventId').innerHTML = currTicketEventIdText;
                document.getElementById('formTicketOrderEventId').value = currTicketEventIdText;
            }
        </script>

        <!-- PURCHASE MODAL -->
        <div id="purchaseModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="purchaseModalTitle" class="modal-title"></h4>
                        <button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 order-md-1">
                                    <!-- BILLING ADDRESS -->
                                    <h4 class="mb-3">Address</h4>
                                    <form class="needs-validation" action="reserveTickets.php" method="post" novalidate>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName">First name</label>
                                                <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $_SESSION['first_name']; ?>" required disabled>
                                                <div class="invalid-feedback">Valid first name is required.</div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="lastName">Last name</label>
                                                <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $_SESSION['last_name']; ?>" required disabled>
                                                <div class="invalid-feedback">Valid last name is required.</div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" value="<?php echo $_SESSION['email'] ?>" disabled>
                                            <div class="invalid-feedback">Please enter a valid email address for shipping updates.</div>
                                        </div>

                                         <!-- TICKET INFORMATION -->
                                        <h4 class="mb-3">Ticket Information</h4>

                                        <div class="mb-3" style="display:none">
                                            <input name="ticketOrderEventId" id="formTicketOrderEventId" type="hidden">
                                        </div>

                                        <div class="mb-3">
                                            <label for="numOfTickets">Number of Ticket(s)</label>
                                            <input type="number" class="form-control" name="numOfTickets" id="numOfTicketsNumber" placeholder="1" min="1" data-bind="value:replyNumber" required>
                                            <div class="invalid-feedback">Please enter a valid number.</div>
                                        </div>

                                        <hr class="mb-4">
                                        <button id="confirmTicketPurchaseBtn" class="btn btn-primary btn-lg btn-block" name="confirmPurchaseBtn"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</html>