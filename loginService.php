<?php
//odd bug where i need to refresh db connection & session start.
require 'db_connection.php';
session_start();
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$result = $mysqli->query("SELECT * FROM user WHERE email='$email'");
//Check if e-mail is in db
if ($result->num_rows == 0) {
    $_SESSION['message'] = 'E-mail does not exist!';
    header("location: error.php");
}
//__________________User found, check pw_______________________
else {
    $user_email = mysqli_fetch_assoc($result);
    if (password_verify($_POST['password'], $user_email['password'])) {
        $_SESSION['first_name'] = $user_email['firstName'];
        $_SESSION['last_name'] = $user_email['lastName'];
        $_SESSION['email'] = $user_email['email'];
        $_SESSION['logged_in'] = true;
        header("location: index.php");
    }
    //________________Passwords DO NOT match__________________
    else {
        $_SESSION['message'] = "Wrong password, try again!";
        header("location: error.php");
    }
}
?>
