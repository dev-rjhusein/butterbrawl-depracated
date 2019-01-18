<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: /index.php");
        exit();
    }
    header("Location: con404.php");
    
    $page_title = $_SESSION['first_name']."'s Tips and Tricks";
    include ("partials/header.inc");
?>
<body>

<!-- NAVBAR -->
<?php include ("partials/navbar.inc"); ?>
















<?php
    include ("partials/footer.inc");
?>