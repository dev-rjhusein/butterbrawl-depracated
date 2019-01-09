<?php
    session_start();
    $user = $_SESSION['username'];

    include ('db_connect.php');
    connDB();

    $idWeight = array();
    $ids = array();
    $weights = array();


    $getLogsQuery = "SELECT recordDate, weight FROM ".$user."_weight_log;";

    if($result = mysqli_query($connection, $getLogsQuery)){
        while($row = mysqli_fetch_assoc($result)){
            $idWeight[] = $row;
            
        }
    }else{
        echo mysqli_error($connection);
    }
    echo json_encode($idWeight);
 