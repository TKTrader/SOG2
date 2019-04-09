<?php
require '../components/header.php';
$thisPage="Tickets";

/* IS THIS THE CORRECT SYNTAX TO SHOW DIFFERENT LOGINS?
if ($_SESSION['access'] == 'A'){
    // request for free tickets
    //header("Location: ./AthleteInterface/athleteIndex.php");
    exit();
} else if ($_SESSION['access'] == 'E'){
     // request for free tickets
    //header("Location: ./EmployeeInterface/employeeIndex.php");
    exit();
} else if ($_SESSION['access'] == 'P'){
    //header("Location: ./PublicInterface/publicIndex.php");
    exit();
} else {
    //header("location: Controllers/error.php");
}*/
?>

<html>
    <?php require '../components/nav.php'; ?>
    <body>
        <?php require '../components/eventCard.php' ?>
    </body>
    <?php require '../components/footer.php'; ?>
</html>

<!--
page displays cards of competition events with a buy ticket button
    if user is logged in it shows that
    if a user is not logged in it shows that but also a "sign in/sign up" link on the bottom
-->

<!--
tickets are per competition event
tickets are available to public at full price
athletes and employees request for free
if competition event time changes, corresponding tickets are udpated
medal awards ceremonies are free to go to 
-->