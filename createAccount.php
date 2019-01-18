<?php
$page_title = "Create Account";
include ("partials/header.inc");
?>

<body onload="document.createAccountForm.reset();">

<div class="container">
    <!-- LOGO -->
    <div class="col">
        <img class="rounded mx-auto d-block" src="/resources/images/bblogo.png" height="30%" width="auto">
    </div>
    
    <form name="createAccountForm" action="database_functions/submitNewAccount.php" method="POST">

            <!-- USERNAME -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <div class="row">
                    <label style="margin-left: 15px;" for="username">Username: </label>     
                    <!-- replace with popover -->
                    <div class="form-group col-md-6">
                        <p style="margin:0; padding:0; font-size: 15px;" id="usernameFeedback"></p>
                    </div>
                </div>
                <input class="form-control" type="text" name="username" id="username" maxlength="30" onkeyup="checkExists(this.value)" required>
            </div>

            <!-- Email address -->
            <div class="form-group col-md-6">
                <label style="margin-left: 15px;" for="email">Email: </label>                    
                <input class="form-control" type="email" name="email" id="email" maxlength="100" required>
            </div>
            
        </div>

        <!-- Password -->
        <div class="form-row">            
            <div class="form-group col-md-6">
                <label for="password1">Password: </label>
                <input class="form-control" type="password" name="password1" onkeyup="passwordMatch()" id="password1" maxlength="30" required>
            </div>

            <div class="form-group col-md-6">
                <label for="password2">Repeat Password: </label>
                <input class="form-control" type="password" name="password2" onkeyup="passwordMatch()" id="password2" maxlength="30" required>
            </div>
            
        </div>

        <!-- FIRST/LAST NAME -->
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="first_name">First Name:</label>
            <input class="form-control" type="text" name="firstname" maxlength="30" required>
        </div>
        <div class="form-group col-md-6">
            <label for="last_name">Last Name:</label>
            <input class="form-control" type="text" name="lastname" maxlength="30" required>
        </div>
    </div>

    <!-- WEIGHT/HEIGHT/GENDER/DOB -->
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="weight">Weight:</label>
            <input type="number" name="weight" step="0.01" min="100" required>
        </div>
        <div class="form-group col-md-2">
            <label for="DOB">Birthday:</label>
            <input type="date" name="DOB" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="height">Height:</label>
            <div id="height">
                <select name="heightFeet" required>
                    <option disabled selected value="">ft</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <select name="heightInches" required>
                    <option disabled selected value="">in</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                </select>
            </div>
        </div>

        <div class="form-group col-md-2">
            <input type="radio" name="gender" value="Male" required><label>Male</label><br>
            <input type="radio" name="gender" value="Female"><label>Female</label>
        </div>
    </div>



    <!-- SUBMIT -->
            <button class="btn btn-success btn-large btn-block" type="submit" name="submitNewAccount" id="submitNewAccount" disabled="true">Create Account</button>
            <button class="btn btn-secondary btn-large btn-block" type="button" onclick="goBack()">Cancel</button>
            <script>
                let goBack = () => {window.history.back();}
            </script>


    </form>
</div>

<?php
include ("partials/footer.inc");
?>