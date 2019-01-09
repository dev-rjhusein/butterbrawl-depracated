<?php
    include ('db_connect.php');
    connDB();

    $names = array();
    $usernames = array();
    $startWeights = array();
    $currentWeights = array();

    //get everyones user_names and original weights;
    $getNameAndWeight = "SELECT user_name, first_name, starting_weight FROM user_account;";

    if($result = mysqli_query($connection, $getNameAndWeight)){
        $nameWeightArray = array();
        //Move result to an array
        while($row = mysqli_fetch_assoc($result)){
            $nameWeightArray[] = $row;
        }

        //Move to array of key:value 
        $json = json_encode($nameWeightArray);
        $arr = json_decode($json);

        //Move to reg arrays
        for($i = 0; $i < sizeof($arr); $i++){
            $usernames[] = $arr[$i]->user_name;
            $startWeights[] = $arr[$i]->starting_weight;
            $names[] = $arr[$i]->first_name;
        }
      
    }else{
        echo "Error";
    }

    
        // Loop
        //   Use name to get current weight and store in $currentWeights
        for($i = 0; $i < sizeof($startWeights); $i++){
            $getCurrentWeight = "SELECT weight FROM ".$usernames[$i]."_weight_log ORDER BY id DESC LIMIT 1;";
            if($result = mysqli_query($connection, $getCurrentWeight)){
                $row = mysqli_fetch_row($result);
                $currentWeights[] = $row[0];

            }else{
                echo "Error getting current weights";
            }
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
            $namesAndPercents[$names[$i]] = $percentLost[$i];
        }

        //return the assoc array with names and percentages to /rankings/rankingList.js call
        echo json_encode($namesAndPercents);
    


