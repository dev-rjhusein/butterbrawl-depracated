<?php 
include ('../db_connect.php');
connDB();

$createString = "
INSERT INTO user_account
(user_name, password, first_name, last_name, starting_weight, current_weight, dob, height_ft, height_in, gender)
VALUES(
    'rjhusein3',
    'booger',
    'Rami',
    'Husein',
    '225',
    '225',
    '1990-10-03',
    '6',
    '4',
    'Male'
);



INSERT INTO user_account
(user_name, password, first_name, last_name, starting_weight, current_weight, dob, height_ft, height_in, gender)
VALUES(
    'rjhusein4',
    'booger',
    'Brittany',
    'Husein',
    '160',
    '160',
    '1990-10-03',
    '5',
    '4',
    'Female'
);



INSERT INTO user_account
(user_name, password, first_name, last_name, starting_weight, current_weight, dob, height_ft, height_in, gender)
VALUES(
    'rjhusein2',
    'booger',
    'Sayeed',
    'Husein',
    '100',
    '100',
    '1990-10-03',
    '4',
    '0',
    'Male'
);



INSERT INTO user_account
(user_name, password, first_name, last_name, starting_weight, current_weight, dob, height_ft, height_in, gender)
VALUES(
    'rjhusein1',
    'booger',
    'Courtney',
    'Newell',
    '161',
    '161',
    '1990-10-03',
    '5',
    '4',
    'Female'
);



INSERT INTO user_account
(user_name, password, first_name, last_name, starting_weight, current_weight, dob, height_ft, height_in, gender)
VALUES(
    'rjhusein5',
    'booger',
    'Andrew',
    'Newell',
    '180',
    '180',
    '1990-10-03',
    '5',
    '9',
    'Male'
);



INSERT INTO user_account
(user_name, password, first_name, last_name, starting_weight, current_weight, dob, height_ft, height_in, gender)
VALUES(
    'rjhusein6',
    'booger',
    'Erin',
    'Scott',
    '200',
    '200',
    '1990-10-03',
    '5',
    '7',
    'Female'
);



INSERT INTO user_account
(user_name, password, first_name, last_name, starting_weight, current_weight, dob, height_ft, height_in, gender)
VALUES(
    'rjhusein7',
    'booger',
    'Cindy',
    'Garten',
    '140',
    '140',
    '1990-10-03',
    '5',
    '10',
    'Female'
);



INSERT INTO user_account
(user_name, password, first_name, last_name, starting_weight, current_weight, dob, height_ft, height_in, gender)
VALUES(
    'rjhusein8',
    'booger',
    'Lauri',
    'Ruth',
    '240',
    '240',
    '1990-10-03',
    '5',
    '7',
    'Female'
);



INSERT INTO user_account
(user_name, password, first_name, last_name, starting_weight, current_weight, dob, height_ft, height_in, gender)
VALUES(
    'rjhusein9',
    'booger',
    'Mike',
    'Ruth',
    '210',
    '210',
    '1990-10-03',
    '6',
    '0',
    'Male'
);



INSERT INTO user_account
(user_name, password, first_name, last_name, starting_weight, current_weight, dob, height_ft, height_in, gender)
VALUES(
    'rjhusein10',
    'booger',
    'Alyssa',
    'Rogers',
    '175',
    '175',
    '1990-10-03',
    '5',
    '8',
    'Female'
);

";
if(mysqli_multi_query($connection, $createString)){

}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createString;
}

//Clear mysqli_multi_query results
while(mysqli_next_result($connection)){;}


    


$dumpLogString = "DROP TABLE IF EXISTS rjhusein1_weight_log;";
if(mysqli_query($connection, $dumpLogString)){    


    $createLogString = "CREATE TABLE rjhusein1_weight_log(
    id INT NOT NULL AUTO_INCREMENT,
    recordDate DATE NOT NULL,
    weight INT NOT NULL,
    PRIMARY KEY (id));";
    if(mysqli_query($connection, $createLogString)){  



        $getCurrentWeight = "SELECT current_weight FROM user_account WHERE user_name='rjhusein1'";
        if($result = mysqli_query($connection, $getCurrentWeight)){
            $row = mysqli_fetch_row($result);
            $cWeight = $row[0];


            $firstLogEntry = "INSERT INTO rjhusein1_weight_log(
            recordDate, weight) values (CURDATE(), '".$cWeight."');";

            if(mysqli_query($connection, $firstLogEntry)){
                header("Location: /index.php");
            }else{
                echo "Error! : ".mysqli_error($connection)." ~~~ ".$firstLogEntry;
            }



        }else{
        echo "Error! : ".mysqli_error($connection)." ~~~ ".$getCurrentWeight;
        }



    }else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createLogString;
    }


}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$dumpLogString;
}


/************************************************************************************************************************************************** */


    


$dumpLogString = "DROP TABLE IF EXISTS rjhusein2_weight_log;";
if(mysqli_query($connection, $dumpLogString)){    


    $createLogString = "CREATE TABLE rjhusein2_weight_log(
    id INT NOT NULL AUTO_INCREMENT,
    recordDate DATE NOT NULL,
    weight INT NOT NULL,
    PRIMARY KEY (id));";
    if(mysqli_query($connection, $createLogString)){  



        $getCurrentWeight = "SELECT current_weight FROM user_account WHERE user_name='rjhusein2'";
        if($result = mysqli_query($connection, $getCurrentWeight)){
            $row = mysqli_fetch_row($result);
            $cWeight = $row[0];


            $firstLogEntry = "INSERT INTO rjhusein2_weight_log(
            recordDate, weight) values (CURDATE(), '".$cWeight."');";

            if(mysqli_query($connection, $firstLogEntry)){
                header("Location: /index.php");
            }else{
                echo "Error! : ".mysqli_error($connection)." ~~~ ".$firstLogEntry;
            }



        }else{
        echo "Error! : ".mysqli_error($connection)." ~~~ ".$getCurrentWeight;
        }



    }else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createLogString;
    }


}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$dumpLogString;
}


/************************************************************************************************************************************************** */


    


$dumpLogString = "DROP TABLE IF EXISTS rjhusein3_weight_log;";
if(mysqli_query($connection, $dumpLogString)){    


    $createLogString = "CREATE TABLE rjhusein3_weight_log(
    id INT NOT NULL AUTO_INCREMENT,
    recordDate DATE NOT NULL,
    weight INT NOT NULL,
    PRIMARY KEY (id));";
    if(mysqli_query($connection, $createLogString)){  



        $getCurrentWeight = "SELECT current_weight FROM user_account WHERE user_name='rjhusein3'";
        if($result = mysqli_query($connection, $getCurrentWeight)){
            $row = mysqli_fetch_row($result);
            $cWeight = $row[0];


            $firstLogEntry = "INSERT INTO rjhusein3_weight_log(
            recordDate, weight) values (CURDATE(), '".$cWeight."');";

            if(mysqli_query($connection, $firstLogEntry)){
                header("Location: /index.php");
            }else{
                echo "Error! : ".mysqli_error($connection)." ~~~ ".$firstLogEntry;
            }



        }else{
        echo "Error! : ".mysqli_error($connection)." ~~~ ".$getCurrentWeight;
        }



    }else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createLogString;
    }


}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$dumpLogString;
}


/************************************************************************************************************************************************** */


    


$dumpLogString = "DROP TABLE IF EXISTS rjhusein4_weight_log;";
if(mysqli_query($connection, $dumpLogString)){    


    $createLogString = "CREATE TABLE rjhusein4_weight_log(
    id INT NOT NULL AUTO_INCREMENT,
    recordDate DATE NOT NULL,
    weight INT NOT NULL,
    PRIMARY KEY (id));";
    if(mysqli_query($connection, $createLogString)){  



        $getCurrentWeight = "SELECT current_weight FROM user_account WHERE user_name='rjhusein4'";
        if($result = mysqli_query($connection, $getCurrentWeight)){
            $row = mysqli_fetch_row($result);
            $cWeight = $row[0];


            $firstLogEntry = "INSERT INTO rjhusein4_weight_log(
            recordDate, weight) values (CURDATE(), '".$cWeight."');";

            if(mysqli_query($connection, $firstLogEntry)){
                header("Location: /index.php");
            }else{
                echo "Error! : ".mysqli_error($connection)." ~~~ ".$firstLogEntry;
            }



        }else{
        echo "Error! : ".mysqli_error($connection)." ~~~ ".$getCurrentWeight;
        }



    }else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createLogString;
    }


}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$dumpLogString;
}


/************************************************************************************************************************************************** */


    


$dumpLogString = "DROP TABLE IF EXISTS rjhusein5_weight_log;";
if(mysqli_query($connection, $dumpLogString)){    


    $createLogString = "CREATE TABLE rjhusein5_weight_log(
    id INT NOT NULL AUTO_INCREMENT,
    recordDate DATE NOT NULL,
    weight INT NOT NULL,
    PRIMARY KEY (id));";
    if(mysqli_query($connection, $createLogString)){  



        $getCurrentWeight = "SELECT current_weight FROM user_account WHERE user_name='rjhusein5'";
        if($result = mysqli_query($connection, $getCurrentWeight)){
            $row = mysqli_fetch_row($result);
            $cWeight = $row[0];


            $firstLogEntry = "INSERT INTO rjhusein5_weight_log(
            recordDate, weight) values (CURDATE(), '".$cWeight."');";

            if(mysqli_query($connection, $firstLogEntry)){
                header("Location: /index.php");
            }else{
                echo "Error! : ".mysqli_error($connection)." ~~~ ".$firstLogEntry;
            }



        }else{
        echo "Error! : ".mysqli_error($connection)." ~~~ ".$getCurrentWeight;
        }



    }else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createLogString;
    }


}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$dumpLogString;
}


/************************************************************************************************************************************************** */


    


$dumpLogString = "DROP TABLE IF EXISTS rjhusein6_weight_log;";
if(mysqli_query($connection, $dumpLogString)){    


    $createLogString = "CREATE TABLE rjhusein6_weight_log(
    id INT NOT NULL AUTO_INCREMENT,
    recordDate DATE NOT NULL,
    weight INT NOT NULL,
    PRIMARY KEY (id));";
    if(mysqli_query($connection, $createLogString)){  



        $getCurrentWeight = "SELECT current_weight FROM user_account WHERE user_name='rjhusein6'";
        if($result = mysqli_query($connection, $getCurrentWeight)){
            $row = mysqli_fetch_row($result);
            $cWeight = $row[0];


            $firstLogEntry = "INSERT INTO rjhusein6_weight_log(
            recordDate, weight) values (CURDATE(), '".$cWeight."');";

            if(mysqli_query($connection, $firstLogEntry)){
                header("Location: /index.php");
            }else{
                echo "Error! : ".mysqli_error($connection)." ~~~ ".$firstLogEntry;
            }



        }else{
        echo "Error! : ".mysqli_error($connection)." ~~~ ".$getCurrentWeight;
        }



    }else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createLogString;
    }


}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$dumpLogString;
}


/************************************************************************************************************************************************** */


    


$dumpLogString = "DROP TABLE IF EXISTS rjhusein7_weight_log;";
if(mysqli_query($connection, $dumpLogString)){    


    $createLogString = "CREATE TABLE rjhusein7_weight_log(
    id INT NOT NULL AUTO_INCREMENT,
    recordDate DATE NOT NULL,
    weight INT NOT NULL,
    PRIMARY KEY (id));";
    if(mysqli_query($connection, $createLogString)){  



        $getCurrentWeight = "SELECT current_weight FROM user_account WHERE user_name='rjhusein7'";
        if($result = mysqli_query($connection, $getCurrentWeight)){
            $row = mysqli_fetch_row($result);
            $cWeight = $row[0];


            $firstLogEntry = "INSERT INTO rjhusein7_weight_log(
            recordDate, weight) values (CURDATE(), '".$cWeight."');";

            if(mysqli_query($connection, $firstLogEntry)){
                header("Location: /index.php");
            }else{
                echo "Error! : ".mysqli_error($connection)." ~~~ ".$firstLogEntry;
            }



        }else{
        echo "Error! : ".mysqli_error($connection)." ~~~ ".$getCurrentWeight;
        }



    }else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createLogString;
    }


}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$dumpLogString;
}


/************************************************************************************************************************************************** */


    


$dumpLogString = "DROP TABLE IF EXISTS rjhusein8_weight_log;";
if(mysqli_query($connection, $dumpLogString)){    


    $createLogString = "CREATE TABLE rjhusein8_weight_log(
    id INT NOT NULL AUTO_INCREMENT,
    recordDate DATE NOT NULL,
    weight INT NOT NULL,
    PRIMARY KEY (id));";
    if(mysqli_query($connection, $createLogString)){  



        $getCurrentWeight = "SELECT current_weight FROM user_account WHERE user_name='rjhusein8'";
        if($result = mysqli_query($connection, $getCurrentWeight)){
            $row = mysqli_fetch_row($result);
            $cWeight = $row[0];


            $firstLogEntry = "INSERT INTO rjhusein8_weight_log(
            recordDate, weight) values (CURDATE(), '".$cWeight."');";

            if(mysqli_query($connection, $firstLogEntry)){
                header("Location: /index.php");
            }else{
                echo "Error! : ".mysqli_error($connection)." ~~~ ".$firstLogEntry;
            }



        }else{
        echo "Error! : ".mysqli_error($connection)." ~~~ ".$getCurrentWeight;
        }



    }else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createLogString;
    }


}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$dumpLogString;
}


/************************************************************************************************************************************************** */


    


$dumpLogString = "DROP TABLE IF EXISTS rjhusein9_weight_log;";
if(mysqli_query($connection, $dumpLogString)){    


    $createLogString = "CREATE TABLE rjhusein9_weight_log(
    id INT NOT NULL AUTO_INCREMENT,
    recordDate DATE NOT NULL,
    weight INT NOT NULL,
    PRIMARY KEY (id));";
    if(mysqli_query($connection, $createLogString)){  



        $getCurrentWeight = "SELECT current_weight FROM user_account WHERE user_name='rjhusein9'";
        if($result = mysqli_query($connection, $getCurrentWeight)){
            $row = mysqli_fetch_row($result);
            $cWeight = $row[0];


            $firstLogEntry = "INSERT INTO rjhusein9_weight_log(
            recordDate, weight) values (CURDATE(), '".$cWeight."');";

            if(mysqli_query($connection, $firstLogEntry)){
                header("Location: /index.php");
            }else{
                echo "Error! : ".mysqli_error($connection)." ~~~ ".$firstLogEntry;
            }



        }else{
        echo "Error! : ".mysqli_error($connection)." ~~~ ".$getCurrentWeight;
        }



    }else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createLogString;
    }


}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$dumpLogString;
}


/************************************************************************************************************************************************** */


    


$dumpLogString = "DROP TABLE IF EXISTS rjhusein10_weight_log;";
if(mysqli_query($connection, $dumpLogString)){    


    $createLogString = "CREATE TABLE rjhusein10_weight_log(
    id INT NOT NULL AUTO_INCREMENT,
    recordDate DATE NOT NULL,
    weight INT NOT NULL,
    PRIMARY KEY (id));";
    if(mysqli_query($connection, $createLogString)){  



        $getCurrentWeight = "SELECT current_weight FROM user_account WHERE user_name='rjhusein10'";
        if($result = mysqli_query($connection, $getCurrentWeight)){
            $row = mysqli_fetch_row($result);
            $cWeight = $row[0];


            $firstLogEntry = "INSERT INTO rjhusein10_weight_log(
            recordDate, weight) values (CURDATE(), '".$cWeight."');";

            if(mysqli_query($connection, $firstLogEntry)){
                header("Location: /index.php");
            }else{
                echo "Error! : ".mysqli_error($connection)." ~~~ ".$firstLogEntry;
            }



        }else{
        echo "Error! : ".mysqli_error($connection)." ~~~ ".$getCurrentWeight;
        }



    }else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$createLogString;
    }


}else{
    echo "Error! : ".mysqli_error($connection)." ~~~ ".$dumpLogString;
}


/************************************************************************************************************************************************** */
