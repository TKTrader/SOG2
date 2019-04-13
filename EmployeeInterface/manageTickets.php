<?php
$thisPage="ManageTickets";
require 'components/employeeNav.php';
require '../Controllers/checkAccess.php';

//Kick anyone not an employee out
if ($access != 'E') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: error.php");
}
?>

<body>
  <p>MODIFY TICKETS PAGE</p>
</body>
