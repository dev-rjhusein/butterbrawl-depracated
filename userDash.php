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

    <!-- Page Header -->
    <?php echo "<h1>".$_SESSION['firstName']."'s Dashboard</h1>"; ?>


          
    <!-- Enter a new weight log -->
        <input class="input-group-text" type="number" min="100" max="900" name="newWeight" id="newWeight" placeholder="Enter new weight">
        <?php echo "<button type='button' onclick='
                                        addNewLog(\"".$_SESSION['username']."\", document.querySelector(\"#newWeight\").value); 
                                        getRankings();
                                        reloadBMI(document.querySelector(\"#newWeight\").value);
                                        getSelfRank(\"".$_SESSION['firstName']."\");
                    'class='btn btn-outline-success' >New Log</button><br>"; 
        ?>

    <!-- Logout Button -->
    <br><button type="button" onclick="window.location.replace('/session_functions/logout.php')" class="btn btn-outline-danger">Logout</button>

    <!-- BMI and Ranking Displays -->
    <h2 id="rankLabel"> </h2>
    <h2 id="bmiLabel"> </h2>


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
        <iframe id="iframeRank" src="rankingList.php" height="300" width = "300"></iframe>
        <iframe id="iframeLog" src="weightLogs.php" height="300" width = "300"> </iframe>


<?php
    include ("partials/footer.inc");
?>