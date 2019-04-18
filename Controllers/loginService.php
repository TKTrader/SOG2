<?php
require '../server/db_connection.php';
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
if ($result->num_rows == 0) {
    $_SESSION['message'] = 'E-mail does not exist!';
    header("location: ../controllers/error.php");
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
            header("Location: ../interfaces/AthleteInterface/index.php");
            exit();
        }else if ($_SESSION['access'] == 'E'){
            header("Location: ./../interfaces/EmployeeInterface/index.php");
            exit();
        }else if ($_SESSION['access'] == 'P'){
            header("Location: ./../interfaces/PublicInterface/index.php");
            exit();
        }else {
            ($_SESSION['message'] = "Wrong password, try again!");
            header("location: ../controllers/error.php");
        } 
    }
    //________________Passwords DO NOT match__________________
    else {
        $_SESSION['message'] = "Wrong password, try again!";
        header("location: ../controllers/error.php");
    }
}
?>
