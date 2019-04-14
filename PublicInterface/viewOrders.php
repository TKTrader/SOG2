<?php
$thisPage="ViewOrders";
require 'components/publicNav.php';
require '../controllers/checkAccess.php';

if ($access != 'P') {
    $_SESSION['message'] = 'Invalid Access';
    header("location: ../controllers/error.php");
}
?>

<html>
    <body>
        <h2>Orders</h2>
        <?php
        
        ?>
    </body>
</html>