<?php
  //  if ($_SERVER['REQUEST_METHOD']=='POST') {
   //     if (isset($_POST['confirmPurchaseBtn'])) { 
     //       include __DIR__.'/controllers/processTicket.php';        
    // getting eventId;
    $eventId = mysqli_real_escape_string($mysqli, $_POST['ticketOrderEventId']);

    // getting numTickets
    $numberOfTickets = mysqli_real_escape_string($mysqli, number_format($_POST['numOfTickets']));

    // getting ticketPrice
    $ticketOrderPrice = mysqli_real_escape_string($mysqli, number_format($_POST['pricePerTicket']));

    // getting orderTimeStamp
    date_default_timezone_set("America/New_York");
    $ticketOrderTimeStamp = mysqli_real_escape_string($mysqli, date("Y-m-d H:i:s"));
    
    // getting customerId
    $fName = $_SESSION['first_name'];
    $customerIdSql = "SELECT id FROM `users` WHERE firstName = '$fName'";
    $customerIdResult = mysqli_query($mysqli, $customerIdSql);
    $customerId = mysqli_real_escape_string($mysqli, mysqli_fetch_assoc($customerIdResult)["id"]);

    $ticketOrderSql = "INSERT INTO ticketOrder(eventID, numTickets, ticketPrice, orderTimeStamp, customerID) VALUES('$eventId', $numberOfTickets, $ticketOrderPrice, '$ticketOrderTimeStamp', $customerId)";
    mysqli_query($mysqli, $ticketOrderSql);

    header("Location: viewOrders.php");
    //    }
    //}
?>