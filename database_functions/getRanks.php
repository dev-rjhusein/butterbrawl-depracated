<?php
    include ('db_connect.php');
    connDB();

    $names = array();
    $usernames = array();
    $startWeights = array();
    $currentWeights = array();

    //Get everyones user_names and original weights;
    $getNameAndWeight = "SELECT user_name, first_name, starting_weight, current_weight FROM user_account;";

    if($result = mysqli_query($connection, $getNameAndWeight)){
        $getAllArray = array();

        //Move result to an array of strings
        while($row = mysqli_fetch_assoc($result)){
            $getAllArray[] = $row;
        }

        //Move to array of key:value 
        $json = json_encode($getAllArray);
        $arr = json_decode($json);

        //Move to separate arrays for easier handling
        for($i = 0; $i < sizeof($getAllArray); $i++){
            $usernames[] = $arr[$i]->user_name;
            $names[] = $arr[$i]->first_name;
            $startWeights[] = $arr[$i]->starting_weight;
            $currentWeights[] = $arr[$i]->current_weight;
        }
      
    }else{
        echo "Error getting names and weights: ".mysqli_error($connection);
    }

        
        //Save percentages to an array
        $percentLost = array();
        for($i = 0; $i < sizeof($currentWeights); $i++){
            //$percentLost = (OW - NW) / OW
            $percentLost[] = ($startWeights[$i] - $currentWeights[$i]) / $startWeights[$i];
        }
        
        //Save name : percentage pairs in assoc array
        $namesAndPercents = array();
        for($i = 0; $i < sizeof($percentLost); $i++){
            $namesAndPercents[$i] = array($usernames[$i], $names[$i], $percentLost[$i]);
        }

        //return the assoc array with names and percentages to /rankings/rankingList.js
        echo json_encode($namesAndPercents);
    


