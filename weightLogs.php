<?php
    session_start();
    include ("partials/header.inc");
?>

<body>

<!-- WEIGHT LOG TABLE -->
<div id="logList"> </div>

    <!-- Enter a new weight log -->
    <div class="row">
        <label class="sr-only" for="newWeight">Record New Weight:</label>
        <input class="form-control col-md-2 text-center" style="margin-top: 5px;" type="number" min="100" max="900" name="newWeight" id="newWeight" placeholder="Enter new weight log">

        <?php echo "<button type='button' onclick='
                                        addNewLog(\"".$_SESSION['username']."\", document.querySelector(\"#newWeight\").value); 
                                        getRankings(\"".$_SESSION['first_name']."\");
                                        reloadBMI(document.querySelector(\"#newWeight\").value);
                                        document.querySelector(\"#newWeight\").value = \"\";
                    ' class='btn btn-large btn-success form-group col-md-2'style='margin-top: 5px;'' >Add Log</button><br>"; 
        ?>
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


<?php
    include ("partials/footer.inc");
?>