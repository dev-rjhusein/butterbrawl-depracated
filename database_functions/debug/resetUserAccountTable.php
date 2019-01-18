<!-- Use this script to reset user_account -->
<?php

include ("../db_connect.php");
connDB();

//Reset DB
$dropDB = "DROP DATABASE IF EXISTS butterbrawl_tracker;";

$makeDB = "CREATE DATABASE butterbrawl_tracker;";

//Reset Tables
connDB();

$dropUserAcct = "DROP TABLE IF EXISTS butterbrawl_tracker.user_account;";

$makeUserAcct = "
    CREATE TABLE butterbrawl_tracker.user_account(
        user_name VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        starting_weight INT NOT NULL,
        current_weight INT NOT NULL, 
        dob DATE NOT NULL,
        height_ft INT NOT NULL, 
        height_in INT NOT NULL,
        gender VARCHAR(6) NOT NULL,
        notifications VARCHAR(10) DEFAULT 'none',
        PRIMARY KEY (user_name)
);";


if(!$connection->query($dropDB)){
    echo "Error Dropping DB: ".$connection->connect_errno;
}
if(!$connection->query($makeDB)){
    echo "Error Making DB: ".$connection->connect_errno;
}
if(!$connection->query($dropUserAcct)){
    echo "Error Dropping Table: ".$connection->connect_errno;
}
if(!$connection->query($makeUserAcct)){
    echo "Error Making Table: ".$connection->connect_errno;
}else{
    echo "Success!";
}

$connection->close();

