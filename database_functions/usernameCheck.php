<?php
include "db_connect.php";
connDB();

$param = $_GET['q'];
$queryString = "SELECT COUNT(*) FROM user_account WHERE user_name = '".$param."';";

if($result = mysqli_query($connection, $queryString)){
    $row = mysqli_fetch_array($result);
    echo $row[0];
}else{
    header("Location: /database_functions/debug/con404.php");
}