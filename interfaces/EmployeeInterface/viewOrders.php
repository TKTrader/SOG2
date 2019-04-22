<?php
$thisPage="ViewOrders";
require 'components/employeeNav.php';
?>

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
                                    <th scope="col" class=\'ticketOrdersHeader\'> <font face="Arial">Time Stamp</font> </th> 
                                </tr>
                            </thead>
                        <tbody>';

                $value = 1;
                while ($ticketOrderRow = $ticketOrderResult -> fetch_assoc()) {
                    $numTickets = $ticketOrderRow["numTickets"];
                    $orderTimeStamp = $ticketOrderRow["orderTimeStamp"];
                    $eventId = $ticketOrderRow["eventID"];

                    // getting event's Name
                    $eventNameSql = "SELECT name FROM `olympicevent` WHERE id = '$eventId'";
                    $eventNameResult = mysqli_query($mysqli, $eventNameSql);
                    $eventName = mysqli_fetch_assoc($eventNameResult)["name"];

                    echo '<tr class=\'row'.$value.'\' value='.$value.'> 
                            <td scope="row" id=\'eventId'.$value.'\' value='.$value.'>'.$eventName.'</td> 
                            <td id=\'numTickets'.$value.'\' value='.$value.'>'.$numTickets.'</td> 
                            <td id=\'orderTimeStamp'.$value.'\' value='.$value.'>'.$orderTimeStamp.'</td>
                        </tr>';
                    $value++;
                }
                echo '</tbody></table></div>';
            ?>
        </div>
        <?php require 'components/employeeFooter.php'; ?>
    </body>
</html>