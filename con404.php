
<?php
    session_start();
    $page_title = "Oh nooooooooo";
    include ("partials/header.inc");
?>
<body>

<!-- NAVBAR -->
<?php include ("partials/navbar.inc"); ?>






<div class="container">
    <div class="jumbotron text-center" style="margin-top:20%;">
        <h2> This is not the page you're looking for... </h2>
    </div>

    <div class="col text-center">
        <img src="/resources/images/undercon.gif">
    
        <h4 style="color:white;">We'll be up and running in a <strike> few minutes </strike> ...hours...</h4>
    </div>
</div>









<?php
    include ("partials/footer.inc");
?>