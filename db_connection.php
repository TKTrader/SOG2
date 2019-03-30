<?php
//This file has to be updated per local db user
$host='localhost';
$username='admin';
$password='admin';
$db='sogs';
$mysqli=new mysqli($host, $username, $password, $db) or die ($mysqli->error);
?>
