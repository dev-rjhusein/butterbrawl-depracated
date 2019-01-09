<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: /database_functions/loadAccount.php?u=".$_SESSION['username']);
    }
    $page_title = "Sign In";
    include ("partials/header.inc");
?>
<body>

    <form action="" method="POST">

        <label for="username">Username: </label>
        <input class="input-group-text" type="text" name="username" id="username" placeholder="Enter a username" onfocus="this.style.backgroundColor = 'white'">

        <label for="password">Password: </label>
        <input class="input-group-text" type="password" name="password" id="password" placeholder="Enter a password" onfocus="this.style.backgroundColor = 'white'">

        <button class="btn btn-primary" type="button" name="loginButton" id="loginButton" onclick="checkCreds(document.getElementById('username').value.toLowerCase(), document.getElementById('password').value)">Login</button>
    </form>
    <form action="/createAccount.php" method="POST">
        <button class="btn btn-warning" type="submit" name="createButton" id="createButton">Create Account</button>
    </form>
<?php
    include ("partials/footer.inc");
?>
