<?php
$thisPage="ViewSchedule";
require 'components/athleteNav.php';
require '../controllers/checkAccess.php';

if ($access != 'A') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../controllers/error.php");
}
?>

<html>
    <body>
        test
    </body>
</html>