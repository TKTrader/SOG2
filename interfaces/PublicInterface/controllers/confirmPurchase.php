<?php
  require '../../server/db_connection.php';
  
  // getting all variables
  

  // INSERT INTO ticketOrder(eventID, numTickets, ticketPrice, orderTimeStamp, customerID) VALUES("4", "10", "20.00", "2017-06-24 11:45:00", "11");
  
  header("Location: viewOrders.php");
?>