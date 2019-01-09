<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: /index.php");
        exit();
    }
    $page_title = $_SESSION['firstName']."'s Dashboard";
    include ("partials/header.inc");
?>
<!-- Load all data for elements when the body loads -->
<?php echo "<body onload='
                    getWeightLogs(\"".$_SESSION['username']."\"); 
                    getRankings();
                    getBMI(".$_SESSION['current_weight'].",".$_SESSION['heightFT'].",".$_SESSION['heightIN'].")
                    getSelfRank(\"".$_SESSION['firstName']."\");
            '>"; 
?>
<div class="container">


    <!-- Page Header -->
    <?php echo "<h1 class='jumbotron text-center noBottom'>".$_SESSION['firstName']."'s Dashboard</h1>"; ?>



    <!-- BMI and Ranking Displays -->
    <div class="row">
        <h2 class="col-md-6 text-center" id="rankLabel"> </h2>
        <h2 class="col-md-6 text-center" id="bmiLabel"> </h2>
    </div>


    <!-- Reload the BMI -- Function using PHP must be declared in <script> tag -->
    <script>
        function reloadBMI(weight){
        if(weight < 100 || weight > 900){
            return;
        }
        let heightFT = "<?php session_start(); echo $_SESSION['heightFT']; ?>";
        let heightIN = "<?php session_start(); echo $_SESSION['heightIN']; ?>";

        getBMI(Number(weight), Number(heightFT), Number(heightIN));
    }
    </script>


    <!-- iframes used to display weight log and ranking list -->
    <div class="row">
        <iframe class="col-md-6" id="iframeRank" src="rankingList.php" height="300" width = "300"></iframe>
        <iframe class="col-md-6" id="iframeLog" src="weightLogs.php" height="300" width = "300"> </iframe>
    </div>


    <!-- Enter a new weight log -->
    <div class="row">
        <label class="sr-only" for="newWeight">Record New Weight:</label>
        <input class="form-control col-md-3" style="margin-top: 5px;" type="number" min="100" max="900" name="newWeight" id="newWeight" placeholder="Enter new weight log">

        <?php echo "<button type='button' onclick='
                                        addNewLog(\"".$_SESSION['username']."\", document.querySelector(\"#newWeight\").value); 
                                        getRankings();
                                        reloadBMI(document.querySelector(\"#newWeight\").value);
                                        getSelfRank(\"".$_SESSION['firstName']."\");
                    'class='btn btn-large btn-success form-group col-md-3'style='margin-top: 5px;'' >Add Log</button><br>"; 
        ?>
    </div>





    <!-- Logout Button -->
    <br><button type="button" onclick="window.location.replace('/session_functions/logout.php')" class="btn btn-outline-danger col">Logout</button>

</div>
<?php
    include ("partials/footer.inc");
?>