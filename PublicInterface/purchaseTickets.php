<?php
require 'publicHeader.php';
require '../Controllers/checkAccess.php';
//Kick anyone not an employee out
if ($access != 'P') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../Controllers/error.php");
}
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['confirmPurchaseBtn'])) { 
        include __DIR__.'/processTicket.php';        
    }
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
      <a class="nav-item nav-link" href="index.php">Dashboard<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="purchaseTickets.php">Purchase Tickets</a>
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
                                    <th scope="col"> <font face="Arial">Ticket Price</font> </th>
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
                        $ticketPrice = $row["ticketPrice"]; 
                        echo '<tr value='.$value.'> 
                                <td id=\'ticketEventId'.$value.'\' value='.$value.' style="display:none;">'.$id.'</td> 
                                <td id=\'ticketEventName'.$value.'\' value='.$value.'>'.$eventName.'</td> 
                                <td id=\'ticketDate'.$value.'\' value='.$value.'>'.$date.'</td> 
                                <td id=\'ticketTime'.$value.'\' value='.$value.'>'.$time.'</td> 
                                <td id=\'ticketLocation'.$value.'\' value='.$value.'>'.$location.'</td> 
                                <td id=\'ticketType'.$value.'\' value='.$value.'>'.$type.'</td> 
                                <td id=\'ticketCategory'.$value.'\' value='.$value.'>'.$category.'</td> 
                                <td id=\'ticketPrice'.$value.'\' value='.$value.'>'.$ticketPrice.'</td>
                                <td class="text-center"><button type=\'button\' class=\'btn\' data-toggle="modal" data-target="#purchaseModal" value='.$value.' onClick="setCurrentTicket(this)">Buy Ticket</button></td>
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
            var currTicketPrice;
            var currTicketPriceText;
            var currTicketEventId;
            var currTicketEventIdText;
            function setCurrentTicket(element){
                var value = element.value;
                globalVal = value;
                currEventName = document.getElementById('ticketEventName' + globalVal);
                currEventNameText = currEventName.innerHTML;
                currTicketPrice = document.getElementById('ticketPrice' + globalVal);
                currTicketPriceText = currTicketPrice.innerHTML;
                currTicketEventId = document.getElementById('ticketEventId' + globalVal);
                currTicketEventIdText = currTicketEventId.innerHTML;
                document.getElementById('purchaseModalTitle').innerHTML = "Event: " + currEventNameText;
                document.getElementById('confirmTicketPurchaseBtn').innerHTML = "Confirm Purchase of Ticket";
                document.getElementById('formTicketPrice').innerHTML = currTicketPriceText;
                document.getElementById('formTicketOrderEventId').innerHTML = currTicketEventIdText;
                document.getElementById('formTicketPrice').value = currTicketPriceText;
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
                                    <h4 class="mb-3">Billing address</h4>
                                    <form class="needs-validation" action="purchaseTickets.php" method="post" novalidate>
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

                                        <div class="mb-3">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                                            <div class="invalid-feedback">Please enter your shipping address.</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8 mb-3">
                                                <label for="country">Country</label>
                                                <select class="custom-select d-block w-100" id="country" required>
                                                    <option value="">Choose...</option>
                                                    <?php require 'defaultCountries.php'; ?> 
                                                </select>
                                                <div class="invalid-feedback">Please select a valid country.</div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="zip">Zip</label>
                                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                                <div class="invalid-feedback">Zip code required.</div>
                                            </div>
                                        </div>

                                         <!-- TICKET INFORMATION -->
                                        <h4 class="mb-3">Ticket Information</h4>

                                        <div class="mb-3" style="display:none">
                                            <input name="ticketOrderEventId" id="formTicketOrderEventId" type="hidden">
                                        </div>

                                        <div class="mb-3" style="display:none">
                                            <input name="pricePerTicket" id="formTicketPrice" type="hidden">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="numOfTickets">Number of Ticket(s)</label>
                                            <input type="number" class="form-control" name="numOfTickets" id="numOfTicketsNumber" placeholder="1" min="1" data-bind="value:replyNumber" required>
                                            <div class="invalid-feedback">Please enter a valid number.</div>
                                        </div>

                                        <!-- PAYMENT -->
                                        <h4 class="mb-3">Payment</h4>
                                        <div class="d-block my-3">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="cc-name">Name on card</label>
                                                    <input type="text" class="form-control" id="cc-name" required>
                                                    <small class="text-muted">Full name as displayed on card</small>
                                                    <div class="invalid-feedback">Name on card is required</div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="cc-number">Credit card number</label>
                                                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                                    <div class="invalid-feedback">Credit card number is required</div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="cc-expiration">Expiration</label>
                                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                                    <div class="invalid-feedback">Expiration date required</div>
                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="cc-cvv">CVV</label>
                                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                                    <div class="invalid-feedback">Security code required</div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <button id="confirmTicketPurchaseBtn" class="btn btn-primary btn-lg btn-block" name="confirmPurchaseBtn"></button>
                                    </form>
                                    <script>
                                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                                    (function() {
                                        'use strict';
                                        window.addEventListener('load', function() {
                                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                            var forms = document.getElementsByClassName('needs-validation');
                                            // Loop over them and prevent submission
                                            var validation = Array.prototype.filter.call(forms, function(form) {
                                                form.addEventListener('submit', function(event) {
                                                    if (form.checkValidity() === false) {
                                                        event.preventDefault();
                                                        event.stopPropagation();
                                                    }  
                                                    form.classList.add('was-validated');
                                                    }, false);
                                                });
                                            }, false);
                                        })();
                                </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</html>