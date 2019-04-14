<?php
$thisPage="ManageTickets";
require 'components/employeeNav.php';
require '../controllers/checkAccess.php';

if ($access != 'E') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../controllers/error.php");
}
?>

<html>
  <body>
    <?php
      $query = "SELECT * FROM ticketorder";

      echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">ID</font> </td> 
          <td> <font face="Arial">Event ID</font> </td> 
          <td> <font face="Arial">Event Name</font> </td> 
          <td> <font face="Arial"># of Tickets</font> </td> 
          <td> <font face="Arial">Ticket Price</font> </td> 
          <td> <font face="Arial">Time Stamp</font> </td> 
          <td> <font face="Arial">Customer ID</font> </td> 
          <td> <font face="Arial">Customer Name</font> </td> 
      </tr>';

      
      if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $eventID = $row["eventID"];
            $eventName = $row["eventID"];
            $numTickets = $row["numTickets"];
            $ticketPrice = $row["ticketPrice"];
            $timeStamp = $row["orderTimeStamp"];
            $customerID = $row["customerID"];
            $customerName = $row["customerID"]; 

            echo '<tr> 
                      <td>'.$id.'</td> 
                      <td>'.$eventID.'</td> 
                      <td>'.$eventName.'</td> 
                      <td>'.$numTickets.'</td> 
                      <td>'.$ticketPrice.'</td> 
                      <td>'.$timeStamp.'</td> 
                      <td>'.$customerID.'</td> 
                      <td>'.$customerName.'</td> 
                  </tr>';
        }
      } 
    ?>
  </body>
</html>

<!--
ID
Event ID
Event Name
# of Tickets
Ticket Price
Time Stamp
Customer ID
Customer Name
-->