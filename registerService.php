<?php
//Storing POSTED vars into session vars.
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];
$_SESSION['email'] = $_POST['email'];

//Protect against SQL injections, adds '\' to special characters
$first_name = mysqli_real_escape_string($mysqli, $_POST['firstname']);
$last_name = mysqli_real_escape_string($mysqli, $_POST['lastname']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$password = mysqli_real_escape_string($mysqli, password_hash($_POST['password'], PASSWORD_BCRYPT));
$access = 'P';

/* Duplicate check point
 * Check if duplicate by querying db if stored e-mail in users table == to posted $email value being registered
 * $duplicatecheck will store the results of the row where the email is found
 * if (rows in duplicate check is > 0, it found a result. Meaning email is alrdy registered)
 */
$duplicatecheck = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
if ($duplicatecheck->num_rows > 0) {
    $_SESSION['message'] = 'E-mail already exists!';
    header("location: error.php");
}
//Store session vars into db
else {
    $store_session_vars = "INSERT INTO  users (firstName, lastName, email, password, access) "
  ."VALUES('$first_name','$last_name','$email','$password', '$access')";
    if ($mysqli->query($store_session_vars)) {
        $_SESSION['logged_in'] = true;
        header("location: index.php");
    } else {
        $_SESSION['message'] = 'Something went wrong storing sessions vars...';
        header("location: error.php");
    }
}
