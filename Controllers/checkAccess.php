<?php
/*Code below verifies the session variable for access was gmp_setbit
  if not set then don't do anything*/

//return true if session var is set to anything besides true
$isAccess = isset($_SESSION['access']);

//if true then store value of session var
if ($isAccess == true){
  $access = $_SESSION['access'];
}else{
  $access = false;
}
?>
