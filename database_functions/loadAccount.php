<?php
session_start();
include ("db_connect.php");
connDB();

$_SESSION['username'] = $_GET['u'];

$getUserInfo = "SELECT first_name, last_name, email, starting_weight, current_weight, dob, height_ft, height_in, gender, notifications FROM user_account WHERE user_name='".$_SESSION['username']."';";


if($result = mysqli_query($connection, $getUserInfo)){
    $record = mysqli_fetch_array($result);

    $_SESSION['first_name'] = $record[0];
    $_SESSION['last_name'] = $record[1];
    $_SESSION['email'] = $record[2];
    $_SESSION['starting_weight'] = $record[3];
    $_SESSION['current_weight'] = $record[4];
    $_SESSION['dob'] = $record[5];
    $_SESSION['heightFT'] = $record[6];
    $_SESSION['heightIN'] = $record[7];
    $_SESSION['gender'] = $record[8];
    $_SESSION['notifs'] = $record[9];
    $_SESSION['rank'] = "";

    header("Location: /userDash.php");
}else{
    header("Location: /con404.php");
}