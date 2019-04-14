<?php
$thisPage="PurchaseTickets";
require 'components/publicNav.php';
require '../controllers/checkAccess.php';

if ($access != 'P') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../controllers/error.php");
}
?>

<html>
    <body>
        <div class="container">
            <h2>Available Events</h2>
            <?php
                $query = "SELECT * FROM olympicevent";

                echo '<table id="ticketTable" border="0" cellspacing="2" cellpadding="2"> 
                <tr> 
                    <td> <font face="Arial">ID</font> </td> 
                    <td> <font face="Arial">Event Name</font> </td> 
                    <td> <font face="Arial">Date</font> </td> 
                    <td> <font face="Arial">Time</font> </td> 
                    <td> <font face="Arial">Location</font> </td> 
                    <td> <font face="Arial">Type</font> </td> 
                    <td> <font face="Arial">Category</font> </td>
                    <td> <font face="Arial">Ticket Price</font> </td>
                </tr>';

                $value = 0;
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
                                <td>'.$id.'</td> 
                                <td>'.$eventName.'</td> 
                                <td>'.$date.'</td> 
                                <td>'.$time.'</td> 
                                <td>'.$location.'</td> 
                                <td>'.$type.'</td> 
                                <td>'.$category.'</td> 
                                <td>'.$ticketPrice.'</td>
                                <td><button type=\'button\' class=\'btn\' data-toggle="modal" data-target="#purchaseModal"value='.$value.'>Buy Ticket</button></td>
                            </tr>';
                        $value++;
                    }
                } 
            ?>
        </div>
        
        <!-- PURCHASE MODAL -->
        <div id="purchaseModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Event: ???</h4>
                        <button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 order-md-1">
                                <!-- BILLING ADDRESS -->
                                <h4 class="mb-3">Billing address</h4>
                                <form class="needs-validation" novalidate>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName">First name</label>
                                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                            <div class="invalid-feedback">Valid first name is required.</div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="lastName">Last name</label>
                                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                            <div class="invalid-feedback">Valid last name is required.</div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="username">Username</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">@</span>
                                            </div>
                                            <input type="text" class="form-control" id="username" placeholder="Username" required>
                                            <div class="invalid-feedback" style="width: 100%;">Your username is required.</div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                                        <div class="invalid-feedback">Please enter a valid email address for shipping updates.</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                                        <div class="invalid-feedback">Please enter your shipping address.</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
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

                                    <!-- CHECKBOXES -->
                                    <hr class="mb-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="same-address">
                                        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="save-info">
                                        <label class="custom-control-label" for="save-info">Save this information for next time</label>
                                    </div>
                                    <hr class="mb-4">

                                    <!-- PAYMENT -->
                                    <h4 class="mb-3">Payment</h4>
                                    <div class="d-block my-3">
                                        <div class="custom-control custom-radio">
                                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                            <label class="custom-control-label" for="credit">Credit card</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                            <label class="custom-control-label" for="debit">Debit card</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                            <label class="custom-control-label" for="paypal">PayPal</label>
                                        </div>
                                    </div>

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
                                    <button class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#successModal">Confirm Purchase</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SUCCESS MODAL -->
        <div id="successModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Event: ???</h4>
                        <button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <h3>Thank you for your puchase of ???</h1>
                        <h4>To view all orders, please click <a href="viewOrders.php">here</a>.</h4>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>