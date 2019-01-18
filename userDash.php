<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: /index.php");
        exit();
    }
    $page_title = $_SESSION['first_name']."'s Dashboard";
    include ("partials/header.inc");
?>
<!-- Load all data for elements when the body loads -->
<?php echo "<body onload='
                    getWeightLogs(\"".$_SESSION['username']."\"); 
                    getRankings(\"".$_SESSION['first_name']."\");
                    getBMI(".$_SESSION['current_weight'].",".$_SESSION['heightFT'].",".$_SESSION['heightIN'].")
            '>"; 
?>
<div class="container">


    <!-- NAVBAR -->
    <?php include ("partials/navbar.inc"); ?>



    <!-- Page Header -->
    <?php echo "<h1 style='margin-top: 4vh;' class='jumbotron text-center noBottom'>".$_SESSION['first_name']."'s Dashboard</h1>"; ?>







    <!-- BMI and Ranking Displays -->
    <div class="row">
        <h2 class="col-md-6 text-center" id="rankLabel"> </h2>
        <h2 class="col-md-6 text-center" id="bmiLabel"> </h2>
    </div><br>



            <!-- Loading Spinner ~~~ Display changes to 'none' in resources/calculations/bmi.js when BMI display loads -->
            <div class="col-md-0 d-flex justify-content-center">
                <div id="loadDashSpinner" class="spinner-border text-info" style="visibility: visible; width: 5rem; height: 5rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>


    <!-- iframes used to display weight log and ranking list -->
    <div class="row">
        <div class="col-md-6 text-center">
            <iframe name="iframeRank" class="col-md-6" id="iframeRank" src="rankingList.php" height="450" width = "450"></iframe>
        </div>

        <div class="col-md-6 text-center">
            <iframe name="iframeLog" class="col-md-6" id="iframeLog" src="weightLogs.php" height="450" width = "450"> </iframe>
        </div>
    </div>





    <!-- Logout Button -->
    <br><button type="button" onclick="window.location.replace('/session_functions/logout.php')" class="btn btn-danger col">Logout</button>

</div>
<?php
    include ("partials/footer.inc");
?>