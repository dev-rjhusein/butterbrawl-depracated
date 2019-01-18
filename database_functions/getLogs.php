<?php
    session_start();
    $user = $_SESSION['username'];

    include ('db_connect.php');
    connDB();

    $returnArray = array();


    $getLogsQuery = "SELECT recordDate, weight FROM ".$user."_weight_log;";

    if($result = mysqli_query($connection, $getLogsQuery)){
        while($row = mysqli_fetch_assoc($result)){
            $returnArray[] = $row;            
        }
        echo json_encode($returnArray);   //Return all weights and respective dates

    }else{
        echo "Error getting weights: ".mysqli_error($connection);
    }
 