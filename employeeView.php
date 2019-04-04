<?php
require 'header.php';
require 'checkAccess.php';

//If person trying to access page is not authorized, boot them.
if ($access != 'E'){
  $_SESSION['message'] = 'Invalid Access';
  header("location: error.php");
}
?>
