<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: /database_functions/loadAccount.php?u=".$_SESSION['username']);
    }
    $page_title = "Sign In";
    include ("partials/header.inc");
?>
<body>
<div class="container-fluid">
<div class="col">
    <img class="rounded mx-auto d-block" src="/resources/images/bblogo.png" height="30%" width="auto">
</div>

    <form class="row" action="" method="POST">

        <div class="col-sm">
            <label for="username">Username: </label>
            <input class="input-group-text form-control" type="text" name="username" id="username" placeholder="Enter a username" onfocus="this.style.backgroundColor = 'white'">
        </div>


        <div class="col-sm">
            <label for="password">Password: </label>
            <input class="input-group-text form-control" type="password" name="password" id="password" placeholder="Enter a password" onfocus="this.style.backgroundColor = 'white'">
        </div>


    <div class="col-sm">
        <button style="margin-top: 3vh;" class="btn btn-primary col-sm" type="button" name="loginButton" id="loginButton" onclick="checkCreds(document.getElementById('username').value.toLowerCase(), document.getElementById('password').value)">Login</button>
    </div>
    
    
    </form>

    <form action="/createAccount.php" method="POST">
        <button class="btn btn-success col-sm" type="submit" name="createButton" id="createButton">Create Account</button>
    </form>




</div>





<?php
    include ("partials/footer.inc");
?>
