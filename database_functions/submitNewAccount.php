<?php

include ('db_connect.php');
connDB();

//Save form data
$username = strtolower($_POST['username']);
$pass = $_POST['password2'];
$email = $_POST['email'];
$firstname = ucfirst(strtolower($_POST['firstname']));
$lastname = ucfirst(strtolower($_POST['lastname']));
$weight = $_POST['weight'];
$dob = $_POST['DOB'];
$heightFT = $_POST['heightFeet'];
$heightIN =$_POST['heightInches'];
$gender =$_POST['gender'];


$createAccountString = "INSERT INTO user_account
    (user_name, password, first_name, last_name, email, starting_weight, current_weight, dob, height_ft, height_in, gender)
    VALUES
    (
    '".$username."',
    '".$pass."',
    '".$firstname."',
    '".$lastname."',
    '".$email."',
    '".$weight."',
    '".$weight."',
    '".$dob."',
    '".$heightFT."',
    '".$heightIN."',
    '".$gender."');";    

if(!mysqli_query($connection, $createAccountString)){  
    // header("Location: ")
}


$dumpLogString = "DROP TABLE IF EXISTS ".$username."_weight_log;";
if(mysqli_query($connection, $dumpLogString)){    
}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createLogString;
}

$createLogString = "CREATE TABLE ".$username."_weight_log(
                    id INT NOT NULL AUTO_INCREMENT,
                    recordDate DATE NOT NULL,
                    weight INT NOT NULL,
                    PRIMARY KEY (id));";
if(mysqli_query($connection, $createLogString)){ 
}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createLogString;
}



$firstLogEntry = "INSERT INTO ".$username."_weight_log(
    recordDate, weight) values (CURDATE(), '".$weight."');";

if(mysqli_query($connection, $firstLogEntry)){

    //Send confirmation email on successful account creation
    $fromHead = "From: no.reply@butterbrawl.sytes.net";
    $subject = "Welcome to butterBRAWL!";
    $message = "You're username is ".$username."\r\nLogin now at butterbrawl.sytes.net!\r\n";
    mail($email, $subject, $message, $fromHead);

    //Load account and go to user dashboard
    header("Location: /database_functions/loadAccount.php?u=".$username);
}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$firstLogEntry;
}

