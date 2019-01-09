<?php
include "db_connect.php";
connDB();
$username = $_POST['user'];
$password = $_POST['pass'];


$loginQuery = "SELECT password FROM user_account WHERE user_name='".$username."';";

$result = mysqli_query($connection, $loginQuery);   //mysqli object
$response = mysqli_fetch_array($result);            //as an array | [0] == response



if(sizeof($response[0]) == 0){ // size == 0 if the username isn't found
    // echo "Username incorrect";
    echo "1";
}else{
    if($response[0] != $password){
        // echo "Password incorrect";
        echo "2";
    }else if($response[0] == $password){
        // echo "userDash.php";
        echo "3";
    }
}

