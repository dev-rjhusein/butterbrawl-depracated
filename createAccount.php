<?php
$page_title = "Create Account";
include ("partials/header.inc");
?>

<body onload="document.createAccountForm.reset();">

<div class="container">
    <div class="col">
        <img class="rounded mx-auto d-block" src="/resources/images/bblogo.png" height="30%" width="auto">
    </div>
    
    <form name="createAccountForm" action="database_functions/submitNewAccount.php" method="POST">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="username">Username: </label>
                <input class="form-control" type="text" name="username" id="username" maxlength="30" onkeyup="checkExists(this.value)" required>

            </div>

            <!-- replace with popover -->
            <div class="form-group col-md-6">
                <p style="padding-top: 4vh" id="usernameFeedback"></p>
            </div>
        </div>


        <div class="form-row">            
            <div class="form-group col-md-6">
                <label for="password1">Password: </label>
                <input class="form-control" type="password" name="password1" onblur="passwordMatch()" id="password1" maxlength="30" required>
            </div>

            <div class="form-group col-md-6">
                <label for="password2">Repeat Password: </label>
                <input class="form-control" type="password" name="password2" onblur="passwordMatch()" id="password2" maxlength="30" required>
            </div>
            
        </div>

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
            <input type="radio" name="gender" value="male" required> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
        </div>
    </div>

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