<?php
$thisPage="ViewOrders";
require 'components/publicNav.php';
?>

<html>
    <body>
        <div class="container">
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

                echo '<table id="ticketOrdersTable" border="0" cellspacing="2" cellpadding="2"> 
                    <tr class=\'ticketOrdersTableRow\'> 
                        <td class=\'ticketOrdersHeader\'> <font face="Arial">Event Name</font> </td> 
                        <td class=\'ticketOrdersHeader\'> <font face="Arial"># of Tickets</font> </td> 
                        <td class=\'ticketOrdersHeader\'> <font face="Arial">Price</font> </td> 
                        <td class=\'ticketOrdersHeader\'> <font face="Arial">Time Stamp</font> </td> 
                    </tr>';

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
                            <td id=\'eventId'.$value.'\' value='.$value.'>'.$eventName.'</td> 
                            <td id=\'numTickets'.$value.'\' value='.$value.'>'.$numTickets.'</td> 
                            <td id=\'ticketPrice'.$value.'\' value='.$value.'>'.$ticketPrice.'</td> 
                            <td id=\'orderTimeStamp'.$value.'\' value='.$value.'>'.$orderTimeStamp.'</td>
                        </tr>';
                    $value++;
                }
            ?>
        </div>
        <?php require 'components/publicFooter.php'; ?>
    </body>
</html>