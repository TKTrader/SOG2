<?php
//odd bug where i need to refresh db connection & session start.
require 'Server/db_connection.php';
//session_start(); Might not need this
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
//Check if e-mail is in db
if ($result->num_rows == 0) {
    $_SESSION['message'] = 'E-mail does not exist!';
    header("location: Controllers/error.php");
}
//__________________User found, check pw_______________________
else {
    $user_email = mysqli_fetch_assoc($result);
    if (password_verify($_POST['password'], $user_email['password'])) {
        $_SESSION['first_name'] = $user_email['firstName'];
        $_SESSION['last_name'] = $user_email['lastName'];
        $_SESSION['email'] = $user_email['email'];
        $_SESSION['logged_in'] = true;
        $_SESSION['access'] = $user_email['access'];
        if ($_SESSION['access'] == 'A'){
            header("Location: ./AthleteInterface/index.php");
            exit();
        }else if ($_SESSION['access'] == 'E'){
            header("Location: ./EmployeeInterface/index.php");
            exit();
        }else if ($_SESSION['email'] == 'security@sogs.com'){
            header("Location: ./PublicInterface/security.php");
            exit();
        }else if ($_SESSION['access'] == 'P'){
            header("Location: ./PublicInterface/index.php");
            exit();
        }else {
              ($_SESSION['message'] = "Wrong password, try again!");
            header("location: Controllers/error.php");
        } 
        // header("location: index.php");
    }
    //________________Passwords DO NOT match__________________
    else {
        $_SESSION['message'] = "Wrong password, try again!";
        header("location: Controllers/error.php");
    }
}
?>
