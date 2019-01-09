<?php

include ("../db_connect.php");
connDB();

$userAccountQuery = "DROP TABLE IF EXISTS user_account;
    CREATE TABLE user_account(
        user_name VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        starting_weight INT NOT NULL,
        current_weight INT NOT NULL, 
        dob DATE NOT NULL,
        height_ft INT, 
        height_in INT,
        gender VARCHAR(6),
        PRIMARY KEY (user_name)
    );";

if($connection->multi_query($userAccountQuery)){
    echo "Table reset!";
    //header ("Location: index.php");
}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createAccountString;
    //header ("Location: index.php");
}
