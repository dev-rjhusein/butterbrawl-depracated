<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: /index.php");
        exit();
    }
    $page_title = $_SESSION['first_name']."'s Account";
    include ("partials/header.inc");
?>
<body>
<div class="container">

<!-- NAVBAR -->
<?php include ("partials/navbar.inc"); ?>

<!-- Return errored input css back to normal -->
<script>
    function cssBack(){
        document.querySelector("#newFirstName").style.backgroundColor = "white";   
        document.querySelector("#newLastName").style.backgroundColor = "white";
    }
</script>

<div class="list-group" style="margin-top: 20%;">



<!-- /* ==============================================================
                Name -> First Name | Last Name
=================================================================*/ -->

        <a data-toggle="collapse" href="#nameChangeCollapse" role="button" aria-expanded="false" aria-controls="nameChangeCollapse" class="list-group-item list-group-item-action"> 
            <div class="row">
                <div class="col-md-4"> Name </div>
                    <div class="col-md-4 text-center"> 
                        <div class="row"><?php echo 
                            "<div class='col-md-5 text-right' id='firstNameLabel'>".$_SESSION['first_name']."</div> 
                            <div class='col-md-5' id='lastNameLabel'>".$_SESSION['last_name']."</div>"
                        ?> 
                        </div> 
                    </div>
                <div class="col-md-4 text-right"> <img src="/resources/images/editicon.png" width="10%"> </div> 
            </div>

        </a>
        <div class="col">
            <div class="collapse multi-collapse" id="nameChangeCollapse">
                <div class="card card-body">
                    <div class="row"> 
                        <div class="col text-center"> 
                            <input class="col-md-5" type="text" id="newFirstName" name="newFirstName" placeholder="Enter new first name" onfocus="cssBack()">
                            <input class="col-md-5" type="text" id="newLastName" name="newLastName" placeholder="Enter new last name" onfocus="cssBack()" >
                            <button class="btn btn-primary" type="button" id="newNameButton">Submit</button> 
                        </div> 
                    </div>
                    
                </div>
            </div>
        </div>

        



<!-- /* ==============================================================
                                Email
=================================================================*/ -->
        <a data-toggle="collapse" href="#emailChangeCollapse" role="button" aria-expanded="false" aria-controls="emailChangeCollapse" class="list-group-item list-group-item-action"> 
            <div class="row">
                <div class="col-md-4"> Email </div>
                <div class="col-md-4 text-center"> <?php echo "<div id='emailLabel'>".$_SESSION['email']."</div>"?> </div>
                <div class="col-md-4 text-right"> <img src="/resources/images/editicon.png" width="10%"> </div> 
            </div>

        </a>
        <div class="col">
            <div class="collapse multi-collapse" id="emailChangeCollapse">
                <div class="card card-body">
                    <div class="row"> 
                        <div class="col text-center"> 
                            <input class="col-md-4" type="email" id="newEmail" name="newEmail" placeholder="Enter new email address">
                            <button class="btn btn-primary" type="button" id="newEmailButton">Submit</button> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>




<!-- /* ==============================================================
                            Password
=================================================================*/ -->
        <a data-toggle="collapse" href="#passwordChangeCollapse" role="button" aria-expanded="false" aria-controls="passwordChangeCollapse" class="list-group-item list-group-item-action"> 
            <div class="row">
                <div class="col-md-4"> Password </div>
                <div class="col-md-4 text-center" id="passwordLabel">************* </div>
                <div class="col-md-4 text-right"> <img src="/resources/images/editicon.png" width="10%"> </div> 
            </div>

        </a>
        <div class="col">
            <div class="collapse multi-collapse" id="passwordChangeCollapse">
                <div class="card card-body">
                    <div class="row"> 
                        <div class="col text-center"> 
                            <input class="col-md-4" type="password" id="newPassword1" name="newPassword1" placeholder="Enter new password">
                            <input class="col-md-4" type="password" id="newPassword2" name="newPassword2" placeholder="Confirm new password">
                            <button class="btn btn-primary" type="button" id="newPasswordButton">Submit</button> 
                        </div> 
                    </div>
                    
                </div>
            </div>
        </div>



<!-- /* ==============================================================
                                DOB
=================================================================*/ -->

        <a data-toggle="collapse" href="#dobChangeCollapse" role="button" aria-expanded="false" aria-controls="dobChangeCollapse" class="list-group-item list-group-item-action"> 
            <div class="row">
            <div class="col-md-4"> Birthday </div>
            <div class="col-md-4 text-center" id="dobLabel"> <?php echo $_SESSION['dob']?> </div>
            <div class="col-md-4 text-right"> <img src="/resources/images/editicon.png" width="10%"> </div> 
            </div>

        </a>
        <div class="col">
            <div class="collapse multi-collapse" id="dobChangeCollapse">
                <div class="card card-body">
                    <div class="row"> 
                        <div class="col text-center"> 
                            <input class="col-md-4" type="date" id="newDOB" name="newDOB" >
                            <button class="btn btn-primary" type="button" id="newDOBButton">Submit</button> 
                        </div> 
                    </div>
                    
                </div>
            </div>
        </div>




<!-- /* ==============================================================
                                Gender
=================================================================*/ -->

        <a data-toggle="collapse" href="#genderChangeCollapse" role="button" aria-expanded="false" aria-controls="genderChangeCollapse" class="list-group-item list-group-item-action"> 
            <div class="row">
                <div class="col-md-4"> Gender </div>
                <div class="col-md-4 text-center" id="genderLabel"> <?php echo $_SESSION['gender']?> </div>
                <div class="col-md-4 text-right"> <img src="/resources/images/editicon.png" width="10%"> </div> 
            </div>

        </a>
        <div class="col">
            <div class="collapse multi-collapse" id="genderChangeCollapse">
                <div class="card card-body">
                    <div class="row"> 
                            <div class="col-md-4" >
                                <input type="radio" name="gender" value="Male">
                                <label style="color:black;">Male</label>
                            </div>

                            <div class="col-md-4" >
                                <input type="radio" name="gender" value="Female">
                                <label style="color:black;">Female</label>
                            </div>

                            <button class="btn btn-primary" type="button" id="newGenderButton">Submit</button> 
                        </div> 
                    
                </div>
            </div>
        </div>




<!-- /* ==============================================================
        Phone Number ************ TO BE ADDED LATER ****************
    =================================================================*/ -->


        <!-- <a data-toggle="collapse" href="#phoneNumberChangeCollapse" role="button" aria-expanded="false" aria-controls="phoneNumberChangeCollapse" class="list-group-item list-group-item-action"> 
            <div class="row">
            <div class="col-md-4">Phone Number </div>
            <div class="col-md-4 text-center" id="phoneLabel"> <?php echo "(xxx) xxx-xxxx"?> </div>
            <div class="col-md-4 text-right"> <img src="/resources/images/editicon.png" width="10%"> </div> 
            </div>

        </a>
        <div class="col">
            <div class="collapse multi-collapse" id="phoneNumberChangeCollapse">
                <div class="card card-body">
                    <div class="row"> 
                        <div class="col text-center"> 
                            <input class="col-md-4" type="tel" id="newPhoneNumber" name="newPhoneNumber" >
                            <button class="btn btn-primary" type="button" id="newPhoneButton">Submit</button> 
                        </div> 
                    </div>
                    
                </div>
            </div>
        </div> -->





<!-- /* ==============================================================
                            Get notifications
=================================================================*/ -->          
            
            
        <a data-toggle="collapse" href="#notificationChangeCollapse" role="button" aria-expanded="false" aria-controls="notificationChangeCollapse" class="list-group-item list-group-item-action"> 
            <div class="row">
            <div class="col-md-4"> Notifications </div>
            <div class="col-md-4 text-center" id="notifsLabel"> <?php echo $_SESSION['notifs']?> </div>
            <div class="col-md-4 text-right"> <img src="/resources/images/editicon.png" width="10%"> </div> 
            </div>

        </a>
        <div class="col">
            <div class="collapse multi-collapse" id="notificationChangeCollapse">
                <div class="card card-body">
                    <div class="row">  
                            <!-- <div class="col-md-3" >
                                <input type="radio" name="notifications" value="byText" required>
                                <label style="color:black;">Text</label><br>
                            </div> -->

                            <div class="col-md-4" >
                                <input type="radio" name="notifications" value="Email">
                                <label style="color:black;">Email</label>
                            </div>

                            <div class="col-md-4" >
                                <input type="radio" name="notifications" value="None">
                                <label style="color:black;">Disable</label>
                            </div>

                            <button class="btn btn-primary" type="button" id="newNotificationButton">Submit</button> 
                    </div>
                    
                </div>
            </div>
        </div>

</div>








</div>
<?php
    include ("partials/footer.inc");
?>