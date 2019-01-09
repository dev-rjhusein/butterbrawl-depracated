<?php
    include ('db_connect.php');
    connDB();

    $user = $_GET['u'];
    $weight = $_GET['w'];

    //Make a new log entry in the history logs
    $insertQuery = "INSERT INTO ".$user."_weight_log 
                    (recordDate, weight) values (CURDATE(), \"".$weight."\");";

    if(mysqli_query($connection, $insertQuery)){

        //Update the current weight field in the account
        $updateQuery = "UPDATE user_account SET current_weight=\"".$weight."\" WHERE user_name=\"".$user."\";";
        
        if(mysqli_query($connection, $updateQuery)){
            session_start();
            $_SESSION['current_weight'] = $weight;
        
        }else{
            echo "Error updating the user_acccount current weight";
        }   
    
    }else{
        echo "Error adding the log";
    }

    
