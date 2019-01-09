<?php
session_start();
include ("db_connect.php");
connDB();

$_SESSION['username'] = $_GET['u'];

$getUserInfo = "SELECT * FROM user_account WHERE user_name='".$_SESSION['username']."';";

$result = mysqli_query($connection, $getUserInfo);
$record = mysqli_fetch_array($result);


$_SESSION['firstName'] = $record[2];
$_SESSION['lastName'] = $record[3];
$_SESSION['starting_weight'] = $record[4];
$_SESSION['current_weight'] = $record[5];
$_SESSION['dob'] = $record[6];
$_SESSION['heightFT'] = $record[7];
$_SESSION['heightIN'] = $record[8];
$_SESSION['gender'] = $record[9];
$_SESSION['rank'] = "";

header("Location: /userDash.php");