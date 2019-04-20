<?php
$thisPage="PurchaseTickets";
require 'components/publicNav.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['confirmPurchaseBtn'])) { 
        //include __DIR__.'/controllers/confirmPurchase.php';
        
        // getting eventId;
        $eventId = $_POST['ticketOrderEventId'];

        // getting numTickets
        $numberOfTickets = number_format($_POST['numOfTickets']);

        // getting ticketPrice
        $ticketOrderPrice = number_format($_POST['pricePerTicket']);

        // getting orderTimeStamp
        date_default_timezone_set("America/New_York");
        $ticketOrderTimeStamp = date("Y-m-d H:i:s");
        
        // getting customerId
        $fName = $_SESSION['first_name'];
        $customerIdSql = "SELECT id FROM `users` WHERE firstName = '$fName'";
        $customerIdResult = mysqli_query($mysqli, $customerIdSql);
        $customerId = mysqli_fetch_assoc($customerIdResult)["id"];

        $ticketOrderSql = "INSERT INTO ticketOrder(eventID, numTickets, ticketPrice, orderTimeStamp, customerID) VALUES('$eventId', $numberOfTickets, $ticketOrderPrice, '$ticketOrderTimeStamp', $customerId)";
        mysqli_query($mysqli, $ticketOrderSql);

        header("Location: viewOrders.php");
    }
}
?>

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
        <?php require 'components/publicFooter.php'; ?>
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
                                            <div class="col-md-5 mb-3">
                                                <label for="country">Country</label>
                                                <select class="custom-select d-block w-100" id="country" required>
                                                    <option value="">Choose...</option>
                                                    <option>United States</option>
                                                </select>
                                                <div class="invalid-feedback">Please select a valid country.</div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="state">State</label>
                                                <select class="custom-select d-block w-100" id="state" required>
                                                    <option value="">Choose...</option>
                                                    <option>California</option>
                                                </select>
                                                <div class="invalid-feedback">Please provide a valid state.</div>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="zip">Zip</label>
                                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                                <div class="invalid-feedback">Zip code required.</div>
                                            </div>
                                        </div>

                                         <!-- TICKET INFORMATION -->
                                        <h4 class="mb-3">Ticket Information</h4>

                                        <div class="mb-3"> <!-- style="display:none;" -->
                                            <label for="ticketPrice">ID:</label> <span name="ticketOrderEventId" id="formTicketOrderEventId" required></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="ticketPrice">Price per Ticket $</label><span name="pricePerTicket" id="formTicketPrice" required></span>
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
                                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
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

                                        <hr class="mb-4">
                                        <button id="confirmTicketPurchaseBtn" class="btn btn-primary btn-lg btn-block" onClick="confirmPurchaseOfTicket()" name="confirmPurchaseBtn"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- SCRIPT FOR CALCULATING ORDER PRICE -->
    <script>
        /*function confirmPurchaseOfTicket(){
            currTicketEventIdElem = document.getElementById('ticketEventId' + globalVal);
            currTicketEventId = Number(currTicketEventIdElem.innerHTML);

            currTicketPriceElem = document.getElementById('ticketPrice' + globalVal);
            currTicketPrice = Number(currTicketPriceElem.innerHTML);

            numberOfTicketsElem = document.getElementById('numOfTicketsNumber');
            numberOfTickets = Number(numberOfTicketsElem.value);

            ticketPrice = currTicketPrice * numberOfTickets;
        }*/
    </script>
</html>