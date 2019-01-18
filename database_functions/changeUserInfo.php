<?php
session_start();
include ("db_connect.php");
connDB();



    if(isset($_POST['first']) || isset($_POST['last'])){
        $first = ucfirst(strtolower($_POST['first']));
        $last = ucfirst(strtolower($_POST['last']));
        
        $queryString = "UPDATE user_account SET first_name=\"".$first."\", last_name=\"".$last."\" WHERE user_name=\"".$_SESSION['username']."\";";

        if(mysqli_query($connection, $queryString)){
            $_SESSION['first_name'] = $first;
            $_SESSION['last_name'] = $last;

            $result = array();
            $result[] = $first;
            $result[] = $last;

            echo json_encode($result);
        }else{
            header("Location: /con404.php");
        }
    }


    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $queryString = "UPDATE user_account SET email=\"".$email."\"WHERE user_name=\"".$_SESSION['username']."\";";
        if(mysqli_query($connection, $queryString)){
            $_SESSION['email'] = $email;
            echo $email;
        }else{
            header("Location: /con404.php");
        }

    }

    if(isset($_POST['pw'])){
        $pw = $_POST['pw'];
        $queryString = "UPDATE user_account SET password=\"".$pw."\"WHERE user_name=\"".$_SESSION['username']."\";";
        if(mysqli_query($connection, $queryString)){
            echo "Password successfully changed!";
        }else{
            header("Location: /con404.php");
        }

    }

    if(isset($_POST['dob'])){
        $dob = $_POST['dob'];
        $queryString = "UPDATE user_account SET dob=\"".$dob."\"WHERE user_name=\"".$_SESSION['username']."\";";
        if(mysqli_query($connection, $queryString)){
            ;
        }else{
            header("Location: /con404.php");
        }

    }

    if(isset($_POST['gender'])){
        $gender = $_POST['gender'];
        $queryString = "UPDATE user_account SET gender=\"".$gender."\"WHERE user_name=\"".$_SESSION['username']."\";";
        if(mysqli_query($connection, $queryString)){
            
        }

    }

    // if(isset($_POST['phone'])){
    //     $phone = $_POST['phone'];
    //     $queryString = "UPDATE user_account SET first_name=\"".$phone."\"WHERE user_name=\"".$_SESSION['username']."\";";

    // }

    if(isset($_POST['notif'])){
        $notif = $_POST['notif'];
        $queryString = "UPDATE user_account SET notifications=\"".$notif."\"WHERE user_name=\"".$_SESSION['username']."\";";
        if(mysqli_query($connection, $queryString)){
            
        }
    }



