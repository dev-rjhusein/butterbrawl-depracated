<?php

include ('db_connect.php');
connDB();

$username = strtolower($_POST['username']);
$pass = strtolower($_POST['password2']);
$firstname = strtolower($_POST['firstname']);
$lastname = strtolower($_POST['lastname']);
$weight = strtolower($_POST['weight']);
$dob = strtolower($_POST['DOB']);
$heightFT = strtolower($_POST['heightFeet']);
$heightIN =strtolower($_POST['heightInches']);
$gender =strtolower($_POST['gender']);


$createAccountString = "INSERT INTO user_account
    (user_name, password, first_name, last_name, starting_weight, current_weight, dob, height_ft, height_in, gender)
    VALUES
    (
    '".$username."',
    '".$pass."',
    '".$firstname."',
    '".$lastname."',
    '".$weight."',
    '".$weight."',
    '".$dob."',
    '".$heightFT."',
    '".$heightIN."',
    '".$gender."');";    

if(mysqli_query($connection, $createAccountString)){    
}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createAccountString;
}


$dumpLogString = "DROP TABLE IF EXISTS ".$_POST['username']."_weight_log;";
if(mysqli_query($connection, $dumpLogString)){    
}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createLogString;
}

$createLogString = "CREATE TABLE ".$_POST['username']."_weight_log(
                    id INT NOT NULL AUTO_INCREMENT,
                    recordDate DATE NOT NULL,
                    weight INT NOT NULL,
                    PRIMARY KEY (id));";
if(mysqli_query($connection, $createLogString)){    
}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createLogString;
}



$firstLogEntry = "INSERT INTO ".$_POST['username']."_weight_log(
    recordDate, weight) values (CURDATE(), '".$_POST['weight']."');";

if(mysqli_query($connection, $firstLogEntry)){
    header("Location: /index.php");
}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$firstLogEntry;
}

